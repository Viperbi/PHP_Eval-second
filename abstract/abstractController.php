<?php
//LA CLASSE ABSTRAITE AbstractController.php

abstract class AbstractController{

    private Header $header;
    private Footer $footer;
    private InterfaceModel $model;

    public function __construct(){
        $this->header = new Header();
        $this->footer = new Footer();
        $this->model = new PlayerModel();
    }


    /**
     * Get the value of header
     *
     * @return Header
     */
    public function getHeader(): Header {
        return $this->header;
    }

    /**
     * Set the value of header
     *
     * @param Header $header
     *
     * @return self
     */
    public function setHeader(Header $header): self {
        $this->header = $header;
        return $this;
    }

    /**
     * Get the value of footer
     *
     * @return Footer
     */
    public function getFooter(): Footer {
        return $this->footer;
    }

    /**
     * Set the value of footer
     *
     * @param Footer $footer
     *
     * @return self
     */
    public function setFooter(Footer $footer): self {
        $this->footer = $footer;
        return $this;
    }

    /**
     * Get the value of model
     *
     * @return InterfaceModel
     */
    public function getModel(): InterfaceModel {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param InterfaceModel $model
     *
     * @return self
     */
    public function setModel(InterfaceModel $model): self {
        $this->model = $model;
        return $this;
    }

    abstract public function render():void;
}