<?php
require __DIR__ . '/__cred.php';
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
                    <?php 
                    










                    ?>
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
        <tbody id="data_body">
            <?php  /*<tbody>
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
            <?php endforeach ?>*/ ?>
        </tbody>
    </table>
</div>
<script>
    let page = 1;
    let ori_data;
    const ul_pagi = document.querySelector('.pagination');
    const data_body = document.querySelector('#data_body');

    const tr_str = `<tr>
                        <td><%= sid %></td>
                        <td><%= name %></td>
                        <td><%= email %></td>
                        <td><%= mobile %></td>
                        <td><%= address %></td>
                        <td><%= birthday %></td>
                    </tr>`;
    const tr_func = _.template(tr_str);

    const pagi_str = `<li class="page-item <%= active %>">
                        <a class="page-link" href="#<%= page %>"><%= page %></a>
                        </li>`;
    const pagi_func = _.template(pagi_str);

    const myHashChange = () => {
        let h = location.hash.slice(1);
        page = parseInt(h);
        if (isNaN(page)) {
            page = 1;
        }
        ul_pagi.innerHTML = page;

        fetch('data_list2_api.php?page=' + page)
            .then(res => {
                return res.json();
            })
            .then(json => {
                ori_data = json;
                console.log(ori_data);
                // 資料內容的表格
                let str = '';
                for (let s in ori_data.data) {
                    str += tr_func(ori_data.data[s]);
                }
                data_body.innerHTML = str;

                //分頁標記
                str = '';
                for (let i = 1; i <= ori_data.totalPages; i++) {
                    let active = ori_data.page === i ? 'active' : '';

                    str += pagi_func({
                        active: active,
                        page: i
                    });
                }
                ul_pagi.innerHTML = str;
            });
    }
    window.addEventListener('hashchange', myHashChange);
    myHashChange();
</script>
<?php include __DIR__ . '/__html_foot.php'; ?> 