<?php
//LE CONTROLLER pour la class PlayerController

class PlayerController extends AbstractController
{

    private ?ViewPlayer $player;

    public function __construct()
    {
        $this->setModel(new PlayerModel());
        $this->setHeader(new Header());
        $this->setFooter(new Footer());
        $this->player = new ViewPlayer();
    }


    /**
     * Get the value of player
     *
     * @return ViewPlayer
     */
    public function getPlayer(): ViewPlayer
    {
        return $this->player;
    }

    /**
     * Set the value of player
     *
     * @param ViewPlayer $player
     *
     * @return self
     */
    public function setPlayer(ViewPlayer $player): self
    {
        $this->player = $player;
        return $this;
    }

    /**
     * addPlayer
     *
     * @return string
     */
    public function addPlayer(): string
    {
        if (!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["score"])) {

            $username = sanitize($_POST['pseudo']);
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);
            $score = sanitize($_POST['score']);

            $password = password_hash($password, PASSWORD_BCRYPT);

            $this->getModel()["pseudo"]->setPseudo($username)->setEmail($email)->setPassword($password)->setScore($score);

            return "Ajout en cours";
        }
        return "Un des champs est vide, ajout annulé";
    }

    /**
     * getAllPlayers
     *
     * @return string
     */
    public function getAllPlayers(): string
    {
        $array = $this->getModel()->getAll();
        $temp = "";
        foreach ($array as $player) {
            $temp .=
                "<article>
                Le joueur" . $player->getPseudo() . " a un score de " . $player->getScore() . "
            </article>";
        };
        return $temp;
    }

    /**
     * render
     *
     * @return void
     */
    public function render(): void
    {
        $this->addPlayer();
        $this->getAllPlayers();

        echo $this->getHeader()->displayView();
        echo $this->getPlayer()->displayView() . $this->getAllPlayers();
        echo $this->getFooter()->displayView();
    }
}
