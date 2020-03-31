<?php

class Category {
    private $id;
    private $name;
    private $description;
    private $articles;

    public function __construct(
        int $id = null,
        string $name = '',
        string $description = ''
    ) {
        $this->id = $id;

        $this
            ->setName($name)
            ->setDescription($description)
        ;

        $this->articles = [];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    /**
     * Get the value of articles
     */ 
    public function getArticles(): array
    {
        return $this->articles;
    }

    public function addArticle(Article $article): Category {
        array_push($this->articles, $article);

        return $this;
    }

    public function removeArticle(Article $article): Category {
        $index = array_search($article, $this->articles);

        if ($index === false) {
            throw new RunTimeException('Cannot remove article named "' . $article->getName() . '" from category named "' . $this->getName() . '".');
        }

        array_splice($this->articles, $index, 1);

        return $this;
    }
}
