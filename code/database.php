<?php
class Database {
    private $dbh;
    public function __construct() {
        try{
            $dsn = "mysql:host=localhost;dbname=Examenvoorbereiding;charset=utf8";
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (\PDOException $exception) {
            exit('unable to connect. Error message: ' . $exception->getMessage());
        }
    }

    private function statement_execute($sql, $params = []): PDOStatement
	{
		$statement = $this->dbh->prepare($sql);
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
}
    ?>