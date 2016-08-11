[
<?php foreach ($messages as $key => $one) { ?>
    <?php $zpt = (count($messages) > $key + 1) ? ',' : '' ?>
    {"id": "<?php echo $one['id']?>", "name": "<?php echo $one['name'] ?>", "email": "<?php echo $one['email'] ?>", "text": "<?php echo $safe($one['text']) ?>", "modified": "<?php echo $one['modified'] ?>", "picture": "<?php echo $one['picture'] ?>", "date": "<?php echo $one['added'] ?>", "approved": "<?php echo $one['approved'] ?>"}<?php echo $zpt ?>
<?php } ?>
]