<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Banners</li>
  </ol>
</nav>

<div class="row">

    <div class="col">

        <?php
            if (isset($_POST['token'])){
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $dados['image'] = ($_FILES['image']['tmp_name'] ? $_FILES['image'] : null);
                $file = $_FILES['image'];
                $banner = new Banner();
                $banner->CreateBanner($dados);

                if (!$banner->getResult()):
                    echo $banner->getMsg();
                else:
                    $uploud = new Uploud();
                    $uploud->Imagem($file, 'banner/' . $banner->getResult() . '/');
                    echo $banner->getMsg();
                    unset($dados);
                endif;
            }

            if (!empty($_SESSION['msg'])):
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            endif;
        ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="token" value="<?php echo uniqid() ?>">
                <label for="exampleFormControlFile1">Banner</label>
                <input type="file" class="form-control-file" name="image" required>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Publicar Banner</button>
        </form>

    </div>

    <div class="col">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Banner</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('banners');
                foreach($read->getResult() as $banner):
                    extract($banner);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $image; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=banner&tb=banners&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>