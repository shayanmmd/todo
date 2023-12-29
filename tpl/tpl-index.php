<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Task manager UI</title>
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="page">
    <div class="pageHeader">
      <div class="title">Dashboard</div>
      <div class="userPanel">
        <i class="fa fa-chevron-down">
          <a href="?logout">logout</a>
        </i>
        <span class="username"><?= $_SESSION['login']->name ?></span>

      </div>
    </div>
    <div class="main">
      <div class="nav">
        <div class="searchbox">
          <div><i class="fa fa-search"></i>
            <input type="search" placeholder="Search" />
          </div>
        </div>
        <div class="menu">
          <div class="title">Folders</div>
          <ul>
            <i class="fa fa-folder">
              <a style="text-decoration: none; color: #413e3e" href="<?= siteUrl() ?>">All</a>
            </i>
            <?php foreach ($folders as $folder) : ?>
              <li>
                <i class="fa fa-folder">
                  <a style="text-decoration: none; color: #413e3e" href="?folderId=<?= $folder->id ?>">
                </i><?= $folder->name ?>
                <a href="?remove=<?= $folder->id ?>">
                  <i class="fa fa-trash-o">
                  </i>
                </a>
                </a>
              </li>
            <?php endforeach; ?>
            <div>
              <form action="" method="post">
                <input name="folderName" type="text">
                <input name="addFolderButton" type="submit" value="+">
              </form>
            </div>
          </ul>
        </div>
      </div>
      <div class="view">
        <div class="viewHeader">
          <div class="searchbox">
            <form action="/index.php" method="post">
              <div><i class="fa fa-search"></i>
                <input name="addNewTask" type="search">
                <div class="functions">
                  <input name="folderId" type="hidden" value="<?= $_GET['folderId'] ?? null ?>">
                  <input name="addNewTaskButton" type="submit" value="Add New Task">
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="content">
          <div class="list">
            <div class="title">Today</div>
            <ul>
              <?php foreach ($tasks as $task) : ?>
                <li class="<?= ($task->is_done) ? 'checked' : '' ?>">
                  <i class="<?= ($task->is_done) ? 'fa fa-check-square-o' : 'fa fa-square-o' ?>">
                  </i>
                  <span><?= $task->title ?>
                  </span>
                  <a href="?removeTask=<?= $task->id ?>">
                    <i class="fa fa-trash-o">
                    </i>
                  </a>
                <?php endforeach; ?>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="assets/js/script.js"></script>

</body>

</html>