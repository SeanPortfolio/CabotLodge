<?php

class Pagination {

    var $base_url              = '';
    var $total_rows            =  0;
    var $per_page              =  6;
    var $cur_page              =  0;
    var $first_link            = 'First';
    var $next_link             = '&rsaquo;';
    var $prev_link             = '&lsaquo;';
    var $last_link             = 'Last;';
    var $page_query_string     = FALSE;
    var $query_string          = 'page';
    var $separator             = '&hellip;';
    var $element               = 'li';
    var $wrapper_element       = 'ul';
    var $wrapper_element_class = 'pagination';
    var $anchor_class          = 'active';
    var $break_point           = 5;
    var $total_links           = 6;    

    public function __construct($options)
    {

        if( !empty($options) )
        {
            $this->initialize_config($options);
        }
        if ($this->anchor_class != '')
        {

            $this->anchor_class = ' class="'.$this->anchor_class.'" ';
        }
        if ($this->wrapper_element_class != '')
        {
            $this->wrapper_element_class = ' class="'.$this->wrapper_element_class.'" ';
        }
    }

    public function generate_links()
    {

        $query_string_separator = ( $this->page_query_string ) ? $this->page_query_string : '?';

        $set_start           = (int) $this->cur_page;
        $total_pages         = (int) ceil(($this->total_rows / $this->per_page));
        $start               = (int) ($set_start - 1) * $this->per_page;
        $next                = $set_start + 1;
        $prev                = $set_start - 1;
        $loop_start          = 1;
        $loop_end            = $total_pages;


        // Generate pagination
        if($total_pages > 1)
        {

            $pagination .= '<'.$this->wrapper_element.$this->wrapper_element_class.'>';
            $prev_qs = ($prev > 1) ? $query_string_separator.$this->query_string.'='.$prev : '';


            if($total_pages > $this->total_links)
            {

                $loop_start = $set_start - floor($this->break_point / 2);
                $loop_end   = $set_start + floor($this->break_point / 2);

                if($loop_start <= 0)
                {
                    $loop_end += abs($loop_start)+1;
                    $loop_start = 1;
                }
                if($loop_end > $total_pages)
                {
                    $loop_start -= $loop_end-$total_pages;
                    $loop_end = $total_pages;
                }
                $range = range($loop_start,$loop_end);

                if( $set_start >= ($this->break_point-1) )
                {
                    
                    $pagination .= '<'.$this->element.'><a class="lg" href="'.$this->base_url.$query_string_separator.$this->query_string.'=1">First</a></'.$this->element.'>';

                }
                
                
                for($i=1;$i<=$total_pages;$i++)
                {
                    // if($range[0] > 2 && $i == $range[0]) $pagination .= '<li>'.$this->separator.'</li>';
                    if($i==$total_pages || in_array($i,$range))
                    {
                        // $href   = ($i != $set_start) ? ' href="'.$this->base_url.(($i>1) ? $query_string_separator.$this->query_string.'='.$i : '').'"' : '';

                        $href   = ' href="'.$this->base_url.(($i>=1) ? $query_string_separator.$this->query_string.'='.$i : '').'"';

                        $pagination .= '<'.$this->element.(($set_start == $i) ? ' class="active"' : '').'><a'.$href.'>'.$i.'</a></'.$this->element.'>';
                    }

                    if($range[$this->break_point-1] < $total_pages-1 && $i == $range[$this->break_point-1]) $pagination .= '<'.$this->element.' class="hellip">'.$this->separator.'</'.$this->element.'>';
                }

                if( $set_start != $total_pages )
                {

                    $pagination .= '<'.$this->element.'><a class="lg" href="'.$this->base_url.$query_string_separator.$this->query_string.'='.$total_pages.'">Last</a></'.$this->element.'>';
                }
            }
            else
            {
                for ($i=$loop_start; $i <= $loop_end ; $i++)
                { 

                    // $href   = ($i != $set_start) ? ' href="'.$this->base_url.(($i>1) ? $query_string_separator.$this->query_string.'='.$i : '').'"' : '';

                    $href   = ' href="'.$this->base_url.(($i>=1) ? $query_string_separator.$this->query_string.'='.$i : '').'"';

                    $pagination .= '<'.$this->element.( ($set_start == $i) ?  ' class="active"' : '' ).'><a'.$href.'>'.$i.'</a></'.$this->element.'>';
                    
                }
            }


            $pagination .= '</'.$this->wrapper_element.'>';


        }
        else
        {
            $pagination = FALSE;
        }

        return $pagination;
    }

    public function initialize_config($config = array())
    {
        if (count($config) > 0)
        {
            foreach ($config as $key => $val)
            {
                if (isset($this->$key))
                {
                    $this->$key = $val;
                }
            }
        }
    }

}

/* End of file pagination.php */
/* Location: .//classes/pagination.php */

?>