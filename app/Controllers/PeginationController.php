<?php 
namespace App\Controllers;

class PeginationController extends BaseController
{
    var $baseURL        = '';
    var $jquerys        = '';
    var $totalRows      = '';
    var $perPage         = 10;
    var $numLinks        =  2;
    var $currentPage    =  0;
    var $firstLink       = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
    var $nextLink        = 'Next';
    var $lastLink        = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
    var $prevLink        = 'Prev';
    var $anchorClass    = '';
    var $showCount      = true;
    var $currentOffset    = 0;
    var $contentDiv     = '';
    var $additionalParam = '';
    var $getpagechange = '';
    var $getchangestatus = '';

   public function __construct($params = array())
    {
        if (count($params) > 0) {
            $this->initialize($params);
        }

        if ($this->anchorClass != '') {
            $this->anchorClass = 'class="' . $this->anchorClass . '" ';
        }
    }

    public function initialize($params = array())
    {
        if (count($params) > 0) {
            foreach ($params as $key => $val) {
                if (isset($this->$key)) {
                    $this->$key = $val;
                }
            }
        }
    }

    /** 
     * Generate the pagination links 
     */
    public function createLinks()
    {
        // Initialize an empty array for pagination links
        $output = [];

        // If total rows or per page count is zero, return empty result
        if ($this->totalRows == 0 || $this->perPage == 0) {
            return $output;
        }

        // Calculate total pages
        $numPages = ceil($this->totalRows / $this->perPage);

        // If only one page, show info or empty result
        if ($numPages == 1) {
            if ($this->showCount) {
                $output['info'] = 'Showing: ' . $this->totalRows;
            }
            return $output;
        }

        // Determine the current page
        $this->currentPage = max(1, (int)floor($this->currentPage / $this->perPage) + 1);

        // Display current range info if needed
        if ($this->showCount) {
            $currentOffset = $this->currentPage;
            $info = 'Showing ' . (($currentOffset - 1) * $this->perPage + 1) . ' to ' . 
                    min($this->totalRows, $currentOffset * $this->perPage) . ' of ' . $this->totalRows;
            $output['info'] = $info;
        }

        // Generate pagination links
        $links = [];
        $start = max(1, $this->currentPage - $this->numLinks);
        $end = min($numPages, $this->currentPage + $this->numLinks);

        // First link
        if ($this->currentPage > $this->numLinks) {
            $links[] = [
                'type' => 'first',
                'link' => $this->getAJAXlink(0, $this->firstLink)
            ];
        }

        // Previous link
        if ($this->currentPage > 1) {
            $prevPage = max(0, ($this->currentPage - 2) * $this->perPage);
            $links[] = [
                'type' => 'prev',
                'link' => $this->getAJAXlink($prevPage, $this->prevLink)
            ];
        }

        // Number links
        for ($page = $start; $page <= $end; $page++) {
            $offset = ($page - 1) * $this->perPage;
            $links[] = [
                'type' => $page === $this->currentPage ? 'current' : 'number',
                'link' => $this->getAJAXlink($offset, (string)$page)
            ];
        }

        // Next link
        if ($this->currentPage < $numPages) {
            $nextPage = $this->currentPage * $this->perPage;
            $links[] = [
                'type' => 'next',
                'link' => $this->getAJAXlink($nextPage, $this->nextLink)
            ];
        }

        // Last link
        if ($this->currentPage + $this->numLinks < $numPages) {
            $lastPage = ($numPages - 1) * $this->perPage;
            $links[] = [
                'type' => 'last',
                'link' => $this->getAJAXlink($lastPage, $this->lastLink),
            ];
        }

        $output['links'] = $links;

        return $output;
    }




    public function getAJAXlink($count, $text)
    {

        return [[
            'pagecount'=>$count,
            'baseURL'=>$this->baseURL,
            'text'=>$text,
            'class'=>$this->anchorClass,
            'contentDiv'=>$this->contentDiv,
            'getpagechange'=>$this->getpagechange,
            ]
        ];
        
    }
    // $this->getchangestatus: '$this->getchangestatus', 

}