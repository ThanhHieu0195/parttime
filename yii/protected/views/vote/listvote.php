<div class="list-vote">
    <table style="width:100%">
	    <?php $this->widget('zii.widgets.CListView', array(
		    'dataProvider'=>$dataProvider,
		    'itemView'=>'../vote/_itemVote',
		    'template'=>"{items}\n{pager}",
	    )); ?>
    </table>
</div>