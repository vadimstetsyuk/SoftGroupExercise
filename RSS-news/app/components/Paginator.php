<?php

  class Paginator 
  {
    private $items;

    private $allItemsCount;

    private $countPerPage;

    private $currentPage;

    private $pagesCounts;


    /*
    * Initialize paginator
    */
    public function __construct($items, $allItemsCount, $countPerPage, $currentPage)
    {
        $this->items = $items;
        $this->allItemsCount = $allItemsCount;
        $this->countPerPage = $countPerPage;
        $this->currentPage = $currentPage;
    }

    public function items()
    {
      return $this->items;
    }

    public function render()
    {
        $this->pagesCounts = ceil($this->allItemsCount / $this->countPerPage);
        $before = 1;

        if ($this->currentPage > 1)
          $before = $this->currentPage - 1;

        $pages = '<a href="?page=' . ($before) .'">&laquo;</a>';
        
        for ($i = 1; $i <= $this->pagesCounts; $i++) 
        {
          if ($i == $this->currentPage)
            $pages .= '<a href="#" class = "active">' . $i . '</a>';
          else
            $pages .= '<a href="?page=' . $i . '">' . $i . '</a>';
        }

        $after = $this->pagesCounts;

        if ($this->currentPage < $this->pagesCounts)
          $after = $this->currentPage + 1;

        $pages .= '<a href="?page=' . ($after) . '">&raquo;</a>';
        return $pages;
    }
  }