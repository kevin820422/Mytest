<?php

require __DIR__ . '/__connect_db.php';
$page_name = 'data_list2';
?>

<?php include __DIR__ . '/__html_head.php'; ?>
<?php include __DIR__ . '/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav>
                <ul class="pagination pagination-sm">
                    <?php /* <li class="page-item"><a class="page-link <?= $page<=1 ?'disable':'' ?>"
                    href="?page=<?= $page-1 ?>">Previous</a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor ?>
                    <li class="page-item">
                        <a class="page-link <?= $page>=$total_pages ?'disable':'' ?>"
                            href="?page=<?= $page+1 ?>">Next</a>
                    </li> */?>
                </ul>
            </nav>
        </div>
    </div>
    <table class="table border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Birthday</th>
            </tr>
        </thead>
        <?php /*<tbody>
            <!-- <?php $i = 0; ?> -->
        <?php foreach ($rows as $row) : ?>
        <!-- <?php $i += 1; ?> -->
        <tr>
            <!-- <td><?= $i ?></td> -->
            <td><?= $row['sid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['mobile'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['birthday'] ?></td>
        </tr>
        <?php endforeach ?>
        </tbody> */ ?>
    </table>
</div>
<script>
    let page = 1;
    const ul_pagi = document.querySelector('.pagination');

    const myHashChange = () => {
        let h = location.hash.slice(1);
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }
        ul_pagi.innerHTML=page;

        fetch('data_list2_api.php?page='+page)
        .then(res=>{
            return res.json();
        })
        .then(json=>{
            ori_data = json;
            console.log(ori_data);
        })
    }
    window.addEventListener('hashchange', myHashChange);
    myHashChange();

</script>
<?php include __DIR__ . '/__html_foot.php'; ?>