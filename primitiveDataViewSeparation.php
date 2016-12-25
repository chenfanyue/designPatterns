// Data and View combined.
<ul>
  <?php foreach($tasks as $task) : ?>
  	<?php if($task->completed) : ?>
  		<strike><?= $task->description; ?></strike>
  	<?php else: ?>
  		<?= $task->description; ?>
  	<?php endif; ?>
  <?php endforeach; ?>
</ul>






// Data and View seperated.
<ul>
  <?php foreach($tasks as $task) : ?>
  	<?php if($task->completed) : ?>
  		<strike>
  	<?php endif; ?>
  	
  	<?= $task->description; ?>
  		
  	<?php if($task->completed) : ?>
  		</strike>
  	<?php endif; ?>
  <?php endforeach; ?>
</ul>
