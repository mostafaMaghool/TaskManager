
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    
    <div class="userPanel">
    <a href="<?= site_url("?logout=1") ?>"><i class="fa fa-sign-out"></i></a>
    <span class="username"><?= getLoggedInUser()-> name ?? 'NoUser'; ?></span><img src="#" width="40" height="40"/></div>
    

  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Folders</div>
        <ul class="folder-list">
        <li class="<?= isset($_GET['folder_id']) ? '' : 'active' ?>">
          <a href="<?= site_url()?>"><i class="fa fa-tasks"></i> ALL</a>
        </li>
  
          <!-- <?php foreach ($folders as $folder): ?> -->
            <li class="<?= (isset($_GET["folder_id"]) && $_GET["folder_id"] == $folder->id) ? 'active' : '' ?>">

              <a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
              <a href="?delete_folder=<?= $folder->id ?>" class="remove" onclick='return confirm("are you sure to delete ? ");'> X </a>
            </li>
            <!-- <?php endforeach; ?> -->

 

        </ul>
      </div>
      <div>
          <input type="text" id="addFolderInput" placeholder="add new folder"/>
          <button id="addFolderBtn" class="btn clicable">+</button>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">
        <input type="text" id="taskNameInput" placeholder="taskNameInput"/>
      
      </div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>

        <!-- <?php if (sizeof($tasks)): ?> -->

          <?php foreach ($tasks as $task): ?>
            <li class="<?= $task->is_done ? 'checked' : '' ; ?>"> 
              
              <i data-taskId="<?= $task->id?>" class="isDone fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o' ; ?>"></i>
            <!-- <?php var_dump($task);?> -->
            <span><?= htmlspecialchars($task->title) ?></span>

              <div class="info">
                <span style='color: cadetblue;   font-size: 13px;   margin-right: 12px;'><?= $task->created_at ?></span>
                <a href="?delete_task=<?= $task->id ?>" class="remove" onclick='return confirm("are you sure to delete ? ");'> X </a>
              </div>
            </li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>no task here .. 
            </li>
          <?php endif; ?>


          </ul>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="assets/js/script.js"></script>

<script>    

  $(document).ready(function(){


    $('.isDone').click(function(e){
      var tid= $(this).attr('data-taskId');
      $.ajax({
          url: "process/ajaxHandler.php",
          method: "POST",
          data: {action: "doneSwitch", taskId: tid},
          success: function(response) {
              location.reload();
          }
        });
    });
      $('#addFolderBtn').click(function(e){
        var input = $('#addFolderInput');
        // alert(input.val());
        /** ajax promt */
        $.ajax({
          url: "process/ajaxHandler.php",
          method: "POST",
          data: {action: "addFolder", folderName: input.val()},
          success: function(response) {
            if(response == '1'){
              //
              $('<li><a href="#"><i class="fa fa-folder"></i>'+input.val()+'</a></li>').appendTo('ul.folder-list');
            }else{
              alert(response);
            }
          }
        });

        });
        $('#taskNameInput').on('keypress',function(e) {
          if(e.which == 13) {
            $.ajax({
            url: "process/ajaxHandler.php",
            method: "POST",
            data: {action: "addTask",folderId: <?= $_GET['folder_id'] ?? 0?> ,taskTitle: $('#taskNameInput').val()},
            success: function(response) {
              
              if(response == '1'){
                  location.reload();
              }else{
                alert(response);
              }
            }
        });          }
    });
    $('#taskNameInput').focus();
  });
    </script>

  
</body>
</html>
