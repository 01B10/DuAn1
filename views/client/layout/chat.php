<?php 
    // $queryBuilder = new QueryBuilder();
?>

    <form action="" class="typearea">
        <input type="text" name="IdCus" class="incoming_id" value="<?php echo $_SESSION["Login"]["customer"]["Id"]; ?>" id="" hidden>
        <input class="inputfield" name="inputfield" type="text" autocomplete="off">
        <input class="sendbtn" type="button" value="send">
    </form>
    <div class="chat-box"></div>
