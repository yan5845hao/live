<?php

/**
 * Class PLinkPager
 *
$this->widget('PLinkPager',array(
'prevPageLabel'=>'上一页',
'nextPageLabel'=>'下一页',
'pages' =>$dataProvider->pagination,
'maxButtonCount'=>10,//分页数目
));
 */
class PLinkPager extends CLinkPager
{
    const CSS_TOTAL_PAGE='total_page';
    const CSS_TOTAL_ROW='total_row';

    /**
     * @var string the text label for the first page button. Defaults to '<< First'.
     */
    public $totalPageLabel;
    /**
     * @var string the text label for the last page button. Defaults to 'Last >>'.
     */
    public $totalRowLabel;
    public $uri;
    public $pageNum; //页数
    /**
     * Creates the page buttons.
     * @return array a list of page buttons (in HTML code).
     */
    private function getUri($pa){
        $url=$_SERVER["REQUEST_URI"].(strpos($_SERVER["REQUEST_URI"], '?')?'':"?").$pa;
        $parse=parse_url($url);

        if(isset($parse["query"])){
            parse_str($parse['query'],$params);
            unset($params["page"]);
            $url=$parse['path'].'?'.http_build_query($params);
        }
        return $url;
    }

    protected function createPageButtons()
    {
        $this->uri=$this->getUri($pa='');
        $this->maxButtonCount=8;
        $this->firstPageLabel="首页";
        $this->lastPageLabel='末页';
        $this->nextPageLabel='下一页';
        $this->prevPageLabel='上一页';
        $this->header="";

        if(($pageCount=$this->getPageCount())<=1)
            return array();

        list($beginPage,$endPage)=$this->getPageRange();
        $currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
        $this->pageNum = $pageCount;

        $buttons=array();
        // 页数统计
        $buttons[]=$this->createTotalButton(($currentPage+1)."/{$pageCount}",self::CSS_TOTAL_PAGE,false,false);

        // 条数统计
        $buttons[]=$this->createTotalButton("共{$this->getItemCount()}条",self::CSS_TOTAL_ROW,false,false);

        // first page
        $buttons[]=$this->createPageButton($this->firstPageLabel,0,self::CSS_FIRST_PAGE,$currentPage<=0,false);

        // prev page
        if(($page=$currentPage-1)<0)
            $page=0;
        $buttons[]=$this->createPageButton($this->prevPageLabel,$page,self::CSS_PREVIOUS_PAGE,$currentPage<=0,false);

        // internal pages
        for($i=$beginPage;$i<=$endPage;++$i)
            $buttons[]=$this->createPageButton($i+1,$i,self::CSS_INTERNAL_PAGE,false,$i==$currentPage);

        // next page
        if(($page=$currentPage+1)>=$pageCount-1)
            $page=$pageCount-1;
        $buttons[]=$this->createPageButton($this->nextPageLabel,$page,self::CSS_NEXT_PAGE,$currentPage>=$pageCount-1,false);

        // last page
        $buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,self::CSS_LAST_PAGE,$currentPage>=$pageCount-1,false);

        $buttons[] = '  <input type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$this->pageNum.')?'.$this->pageNum.':this.value;location=\''.$this->uri.'&page=\'+page+\'\'}" value="'.($currentPage+1).'" style="width:25px"><input type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$this->pageNum.')?'.$this->pageNum.':this.previousSibling.value;location=\''.$this->uri.'&page=\'+page+\'\'">  ';

        return $buttons;
    }

    protected function createTotalButton($label,$class,$hidden,$selected)
    {
        if($hidden || $selected)
            $class.=' '.($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
        return '<li class="'.$class.'">'.CHtml::label($label,false).'</li>';
    }

    /**
     * Registers the needed client scripts (mainly CSS file).
     */
    public function registerClientScript()
    {
        //if($this->cssFile!==false)
        //	self::registerCssFile($this->cssFile);
    }

    /**
     * Registers the needed CSS file.
     * @param string $url the CSS URL. If null, a default CSS URL will be used.
     */
    public static function registerCssFile($url=null)
    {
        if($url===null)
            $url=CHtml::asset(Yii::getPathOfAlias('application.components.views.LinkPager.pager').'.css');
        Yii::app()->getClientScript()->registerCssFile($url);
    }
}