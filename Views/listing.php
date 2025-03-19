<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <a href="index.php?route=add"><button>Thêm</button></a>
        <hr>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>Instructor</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php
            foreach($arr_products as $row){
                ?>            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td>
                    <img src="images/<?=$row['thumbnail']?>" alt="" width="100px">
                </td>
                <td><?php echo $row['instructor']?></td>
                <td><?php echo $row['duration']?></td>
                <td><?php echo $row['price']?></td>       
                <td><a href="index.php?route=edit&id=<?=$row['id']?>">Sửa</a></td>
                <td><a  onclick="return confirmDelete('index.php?route=delete&id=<?=$row['id']?>');">Xóa</a></td>    
            </tr>
            <?php 
            }
            ?>
        </table>
        <script>
            function confirmDelete(link){
                let a = alert('Bạn có muốn xóa hay không?');
                if(a !== true) window.location.href=link;
            }
        </script>
    </body>
</html>