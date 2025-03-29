<?php
//MODEL POUR LA CLASS ModelPlayer

class PlayerModel implements InterfaceModel{

    private int $id;
    private string $pseudo;
    private string $email;
    private int $score;
    private string $password;
    private PDO $bdd;

    public function __construct() {
        $this->bdd = connect();
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return string
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param string $pseudo
     *
     * @return self
     */
    public function setPseudo(string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of score
     *
     * @return int
     */
    public function getScore(): int {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param int $score
     *
     * @return self
     */
    public function setScore(int $score): self {
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of bdd
     *
     * @return PDO
     */
    public function getBdd(): PDO {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @param PDO $bdd
     *
     * @return self
     */
    public function setBdd(PDO $bdd): self {
        $this->bdd = $bdd;
        return $this;
    }
    
    /**
     * add
     *
     * @return string
     */
    public function add():string{
        try{
            $bdd = $this->getBdd();
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $score = $this->getScore();
            $password = $this->getPassword();
            $requete = "INSERT INTO players(pseudo, email, score, `psswrd`)
            VALUE(?,?,?,?)";
            $req = $bdd->prepare($requete);
            $req->bindParam(1,$pseudo, PDO::PARAM_STR);
            $req->bindParam(2,$email, PDO::PARAM_STR);
            $req->bindParam(3,$score, PDO::PARAM_INT);
            $req->bindParam(4,$password, PDO::PARAM_STR);
            $req->execute();
            return "Ajout à la base de donnée réussi";
        }
        catch(Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    
    /**
     * getAll
     *
     * @return array
     */
    public function getAll(): array|null {
        try {
            $bdd = $this->getBdd();
            $requete = "SELECT id, pseudo, email, score FROM players";
            $req = $bdd->prepare($requete);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    
    /**
     * getByEmail
     *
     * @return array
     */
    public function getByEmail():array|null {
        try {
            $bdd = $this->getBdd();
            $email = $this->getEmail();
            $requete = "SELECT id, pseudo, email, score,`password` FROM account
            WHERE email = ?";
            $req = $bdd->prepare($requete);
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
}