<?php

require_once 'user.php';
require_once 'establishment.php';
require_once 'feedback.php';

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        //$this->pdo = new PDO('mysql:dbname=antony_bap;host=127.0.0.1', 'root', 'root');
        $this->pdo = new PDO('mysql:dbname=antony_bap;host=127.0.0.1', 'root', '');
    }

    // USER'S FUNCTION
    public function InsertUser(User $user): bool
    {
        $query = 'INSERT INTO user (name, email, password, role)
                    VALUES (:name, :email, :password, :role)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name' => $user->name,
            'email' => $user->email,
            'password' => md5($user->password . 'SALT'),
            'role' => $user->role,
        ]);
    }

    public function LoginVerify(User $user): bool
    {
        $query = 'SELECT * FROM user WHERE email = :email';
        $statement = $this->pdo->prepare($query);

        $statement->execute([
            'email' => $user->email
        ]);

        $data = $statement->fetch();

        $passVerified = false;

        if (isset($data[0]) && md5($user->password . 'SALT') === $data['password']) {
            $passVerified = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['user_email'] = $data['email'];
            $_SESSION['user_name'] = $data['name'];
            $_SESSION['user_password'] = $data['password'];
            $_SESSION['role'] = $data['role'];
        }

        return $passVerified;
    }

    // ESTABLISHMENT'S FUNCTION
    public function InsertEstablishment(Establishment $establishment): bool
    {
        $query = 'INSERT INTO establishment (owner_firstname, owner_lastname, owner_email, owner_number, establishment_name, establishment_adress)
                    VALUES (:owner_firstname, :owner_lastname, :owner_email, :owner_number, :establishment_name, :establishment_adress)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'owner_firstname' => $establishment->owner_firstname,
            'owner_lastname' => $establishment->owner_lastname,
            'owner_email' => $establishment->owner_email,
            'owner_number' => $establishment->owner_number,
            'establishment_name' => $establishment->establishment_name,
            'establishment_adress' => $establishment->establishment_adress,
        ]);
    }

    public function GetEstablishment()
    {
        $query = 'SELECT * FROM establishment ORDER BY id';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function GetEstablishmentById($id)
    {
        $query = 'SELECT * FROM establishment WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id
        ]);
        $data = $statement->fetch();
        return $data;
    }

    public function GetEstablishmentByDateAsc()
    {
        $query = 'SELECT * FROM establishment ORDER BY asked_at ASC';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function GetEstablishmentByDateDesc()
    {
        $query = 'SELECT * FROM establishment ORDER BY asked_at DESC';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function GetEstablishmentByStatus($status)
    {
        $query = 'SELECT * FROM establishment WHERE status = :status';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'status' => $status
        ]);
        $data = $statement->fetchAll();
        return $data;
    }

    public function RefuseEstablishment($id)
    {
        $query = 'UPDATE establishment SET status = "Refusé" WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'id' => $id
        ]);
    }
    

    public function AcceptEstablishment($id)
    {      
        // récupérer les informations de la demande d'établissement
        $query = 'SELECT * FROM establishment WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id
        ]);
        $data = $statement->fetch();

        // insérer les informations de l'établissement dans la table "labeled"
        $query = 'INSERT INTO labeled (owner_firstname, owner_lastname, owner_email, owner_number, establishment_name, establishment_adress)
                    VALUES (:owner_firstname, :owner_lastname, :owner_email, :owner_number, :establishment_name, :establishment_adress)';
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'owner_firstname' => $data['owner_firstname'],
            'owner_lastname' => $data['owner_lastname'],
            'owner_email' => $data['owner_email'],
            'owner_number' => $data['owner_number'],
            'establishment_name' => $data['establishment_name'],
            'establishment_adress' => $data['establishment_adress'],
        ]);

        // mettre à jour le statut de la demande d'établissement
        $query = 'UPDATE establishment SET status = "Accepté" WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'id' => $id
        ]);
    }

    public function GetLabeledEstablishment()
    {
        $query = 'SELECT * FROM labeled ORDER BY id';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public function searchEstablishment($searchTerm){
        $query = "SELECT * FROM establishment WHERE status = 'Accepté' AND (owner_firstname LIKE :search OR owner_lastname LIKE :search OR owner_email LIKE :search OR establishment_name LIKE :search OR establishment_adress LIKE :search)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':search', '%'.$searchTerm.'%', PDO::PARAM_STR);
        $statement->execute();
        $establishments = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $establishments;
    }

    public function InsertFeedback(Feedback $feedback) : bool {
        $query = 'INSERT INTO feedback (establishment, name, mail, comment) VALUES (:establishment, :name, :mail, :comment)';
        $statement = $this->pdo->prepare($query);
        return $statement->execute([
            'establishment' => $feedback->establishment,
            'name' => $feedback->name,
            'mail' => $feedback->mail,
            'comment' => $feedback->comment
        ]);
    }
}