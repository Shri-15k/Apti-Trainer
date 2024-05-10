<div class="reply">
    <h4> <?php echo $data['name']; ?> </h4>
    <p> <?php echo $data['date']; ?> </p>
    <p> <?php echo $data['comment']; ?> </p>
    <?php $reply_id = $data['id']; ?>

    <button class="reply" onclick="reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>')">Reply</button>


    <?php
    unset($replydatas);
    $datas = mysqli_query($con, "SELECT * FROM discussion WHERE reply_id = $reply_id");
        if(mysqli_num_rows($datas) > 0){
            foreach($datas as $data) {
                 require 'reply.php';
            }
        }
    ?>
</div>

