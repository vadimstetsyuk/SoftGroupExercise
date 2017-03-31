<?php
  namespace App\Model;

  use Symfony\Component\Validator\Mapping\ClassMetadata;
  use Symfony\Component\Validator\Constraints as Assert;

  class UserEntity {
    private $id;
    private $name;
    private $password;

    public function __construct($user){
      $this->name = $user['name'];
      $this->password = $user['pass'];
    }

    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\Length(array('min' => 5, 'max' => 30)));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint('password', new Assert\Length(array('min' => 8, 'max' => 20)));
    }

    public function getPassword(){
        return md5($this->password);
    }

    public function setPassword($password){
      $this->password = $password;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
      $this->name = $name;
    }
  }
