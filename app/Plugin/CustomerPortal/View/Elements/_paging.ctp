<?php
if (!isset($modules)) {
    $modulus = 5;
}
if (!isset($model)) {
    $models = ClassRegistry::keys();
    if($this->params['controller'] == 'page'){
        $model = 'Page';
    } else {
        $model = Inflector::camelize(current($models));
    }

}

?>
<!-- <div class="pull-left"> -->
        <?php
            //echo $this->Paginator->counter(AppHelper::getLang('Page').' {:page} '.'/'.' {:pages}, '.AppHelper::getLang('showing').' {:current} '.'/'.' {:count} '.AppHelper::getLang('element'));
        ?>
<!-- </div> -->
<div class="paging pull-right">
    <ul class="pagination">
        <?php echo $this->Paginator->first('First', array('tag' => 'li')); ?>

        <?php echo $this->Paginator->prev('Prev', array(
            'tag' => 'li',
            'class' => 'paginate_button previous',
        ), $this->Paginator->link('Prev', array()), array(
            'tag' => 'li',
            'escape' => false,
            'class' => 'paginate_button previous disabled',
        )); ?>

        <?php
        $page = $this->params['paging'][$model]['page'];
        $pageCount = $this->params['paging'][$model]['pageCount'];
        if ($modulus > $pageCount) {
            $modulus = $pageCount;
        }
        $start = $page - intval($modulus / 2);
        if ($start < 1) {
            $start = 1;
        }
        $end = $start + $modulus;
        if ($end > $pageCount) {
            $end = $pageCount + 1;
            $start = $end - $modulus;
        }
        for ($i = $start; $i < $end; $i++) {
            $url = array('page' => $i);
            $class = null;
            if ($i == $page) {
                $url = array();
                $class = 'active';
            }
            echo $this->Html->tag('li', $this->Paginator->link($i, $url), array(
                'class' => $class,
            ));
        }
        ?>

        <?php echo $this->Paginator->next('Next', array(
            'tag' => 'li',
            'class' => 'paginate_button next',
        ), $this->Paginator->link('Next', array()), array(
            'tag' => 'li',
            'escape' => false,
            'class' => 'paginate_button next disabled',
        )); ?>

        <?php echo $this->Paginator->last('Last', array('tag' => 'li')); ?>

    </ul>
</div>
