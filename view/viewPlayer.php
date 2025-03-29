<?php
//LA VIEW POUR LA CLASS ViewPlayer

class ViewPlayer{

    private string $signUpMessage = '';
    private string $playerList = '';

    /**
     * Get the value of playerList
     *
     * @return string
     */
    public function getPlayerList(): string {
        return $this->playerList;
    }

    /**
     * Set the value of playerList
     *
     * @param string $playerList
     *
     * @return self
     */
    public function setPlayerList(string $playerList): self {
        $this->playerList = $playerList;
        return $this;
    }

    /**
     * Get the value of signUpMessage
     *
     * @return string
     */
    public function getSignUpMessage(): string {
        return $this->signUpMessage;
    }

    /**
     * Set the value of signUpMessage
     *
     * @param string $signUpMessage
     *
     * @return self
     */
    public function setSignUpMessage(string $signUpMessage): self {
        $this->signUpMessage = $signUpMessage;
        return $this;
    }

    public function displayView():string{
        ob_start();
        ?>
            <form action="action.php" method="post">
                <label for="pseudo">Pseudo</label>
                <input name="pseudo" id="pseudo" type="text">

                <label for="email">Email</label>
                <input name="email" id="email" type="text">

                <label for="password">Password</label>
                <input name="password" id="paswword" type="text">

                <button type="submit">Add</button>
            </form>
        <?php
        $view = ob_get_clean();
        return $view;
    }
}