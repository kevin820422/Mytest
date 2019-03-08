<style>
.active{
    background-color: #0C98FA;
}

</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?=$page_name=='index_' ? 'active':'' ?>">
                    <a class="nav-link" href="index_.php">Home</a>
                </li>
                
                <li class="nav-item <?=$page_name=='data_list' ? 'active':'' ?>">
                    <a class="nav-link" href="data_list.php">列表</a>
                </li>
                <li class="nav-item <?=$page_name=='data_list2' ? 'active':'' ?>">
                    <a class="nav-link" href="data_list2.php">列表2</a>
                </li>
                <li class="nav-item <?=$page_name=='data_insert' ? 'active':'' ?>">
                    <a class="nav-link" href="data_insert.php">新增</a>
                </li>
              
            </ul>

        </div>

    </div>
</nav> 