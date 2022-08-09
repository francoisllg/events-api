<?
namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email):array;
}
