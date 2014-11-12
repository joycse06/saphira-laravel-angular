<?php  namespace Saphira\Registration;

use Saphira\Users\User;
use Saphira\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class RegisterUserCommandHandler
 * @package Larabook\Registration
 * @author Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle( $command )
    {
        $user = User::register(
            $command->displayName, $command->email, $command->password
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }

}