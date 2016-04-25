<?php
class User
{

    public $lastName;
    public $firstName;
    public $age;
    public $password;
    public $id;

    /*Constructeur*/

    public function __construct($alias, $password, $firstName = null, $lastName = null,$email = null, $birthday = null)
    {
        if($firstName != null && $lastName != null && $email != null && $birthday != null)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->birthday = $birthday;
        }
        $this->alias = $alias;
        $this->password = $password;
    }

    /* Creation user */

    public function createUser()
    {
        global $db;
        $db = connect();
        $query = $db->prepare('INSERT INTO user (id_user, firstname_user, password_user, lastname_user,
        birthday_user, alias_user, email_user)
        VALUES (" ", :firstname, :pass, :lastname, :birthday, :alias, :email)');
            $query->bindValue(':alias', $this->alias, PDO::PARAM_STR);
            $query->bindValue(':pass', $this->password, PDO::PARAM_INT);
            $query->bindValue(':email', $this->email, PDO::PARAM_STR);
            $query->bindValue(':firstname', $this->firstName, PDO::PARAM_STR);
            $query->bindValue(':lastname', $this->lastName, PDO::PARAM_STR);
            $query->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
            $query->execute();

            header('Location: connexion.php');
    }

    public function connectUser()
    {   
        global $db;
        $db = connect();
        $query = $db->prepare('SELECT * FROM user WHERE alias_user = :alias AND password_user = :password');
        $query->bindValue(':alias', $_POST['alias'], PDO::PARAM_STR);
        $query->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        // Accès autorisé

        if (!empty($data)) {
            $_SESSION['firstname'] = $data['firstname_user'];
            $_SESSION['password'] = $data['password_user'];
            $_SESSION['lastname'] = $data['lastname_user'];
            $_SESSION['alias'] = $data['alias_user'];
            $_SESSION['id'] = $data['id_user'];
            $_SESSION['email'] = $data['email_user'];
            $_SESSION['birthday'] = $data['birthday_user'];

            header('Location: panel.php?id=' . $_SESSION['id'] . '');
        } else {
            echo "erreur";
        }
    }
    public function deleteUser(){
        global $db;
        $val = array(':user_id' =>$this->id);
        $req = "DELETE FROM users WHERE user_id = :user_id";
        $res = $db->prepare($req);
        $res->execute($val);
    }
    public function updateUser()
    {
        global $db;

        $val = array(':user_id'=>$this->id, ':firstname'=>$this->firstName, ':lastname'=>$this->lastName, ':age'=>$this->age );
        $req = "UPDATE users SET firstname = :firstname, lastname = :lastname, age = :age WHERE user_id = :user_id";
        $res = $db->prepare($req);
        $res->execute($val);
        $row = $res->fetch(PDO::FETCH_OBJ);
    }


}
?>