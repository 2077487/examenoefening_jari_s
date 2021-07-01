<?php
class Database {

    public function __construct(
         $username,
        $password,
        $host = 'localhost',
        $dbname = 'examenoefening_jari_s',
        $charset = 'utf8mb4'
    ){
        try{
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            $this->pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $exception){
            exit('unable to connect. Error message: ' . $exception->getMessage());
        }
    }

    private function statement_execute($sql, $params = []): PDOStatement
	{
		$statement = $this->pdo->prepare($sql);
		$statement->execute($params);

		return $statement;
	}


    public function create_users(): void {
        $admin_hashed_password = password_hash('admin', PASSWORD_DEFAULT);
        $user_hashed_password = password_hash('user', PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user VALUES
    (NULL, :first_name, :last_name, :phone_number, :email, :password, :is_admin, :created_at, Null),
    (NULL, :first_name1, :last_name1, :phone_number1, :email1, :password1, :is_admin1, :created_at, Null)';
    $this->statement_execute($sql, [
        'first_name' => 'admin',
        'last_name' => 'admin',
        'phone_number' => '06123456789',
        'email' => 'admin@mail.nl',
        'password' => $admin_hashed_password,
        'is_admin' => true,
        'created_at' => date('Y-m-d H:i:s'),

        'first_name1' => 'user',
        'last_name1' => 'user',
        'phone_number1' => '06123456788',
        'email1' => 'user@mail.nl',
        'password1' => $user_hashed_password,
        'is_admin1' => false
    ]);
    }

    public function login(string $email , string $password): void{
        $sql = 'SELECT password, is_admin FROM user WHERE email = :email;';
         $statement = $this->pdo->prepare($sql);
         $statement->execute([
            'email' => $email,
         ]);
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    if (!empty($results) && password_verify($password, $results['password']))
    {
        session_start();
        $_SESSION['logged_in_as'] =$email;
        $_SESSION['is_admin'] = $results['is_admin'] === true;
        header('Location: views/user_main_page.php');
    }
    // else
    // header('location: views/login_incorrect.php');
    }

    public function show_user_info(){
        $sql = 'SELECT first_name, last_name, email, phone_number FROM user WHERE email = :email;';
        $statement = $this->statement_execute($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}
    ?>