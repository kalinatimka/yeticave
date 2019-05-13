<?php
if (count($array['arr_pages']) > 1) {?>
    <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev">
        <?php
            if ($array['cur_page'] > 1) {
            ?>
                <a href="/?page=<?=$array['cur_page'] - 1;?>">Назад</a>
            <?php
            }
            else {
            ?>
                <a class="link-disabled">Назад</a>
            <?php
            }
            ?>
        </li>
        <?php
        foreach ($array['arr_pages'] as $page) {
        ?>
        <li class="pagination-item <?= ($page == $array['cur_page']) ? 'pagination-item-active' : '';?>">
            <a href="<?=$array['link']?><?=$page;?>"><?=$page;?></a>
        </li>
        <?php
        }
        ?>
        <li class="pagination-item pagination-item-next">
            <?php
            if ($array['cur_page'] < count($array['arr_pages'])) {
            ?>
                <a href="/?page=<?=$array['cur_page'] + 1;?>">Вперед</a>
            <?php
            }
            else {
            ?>
                <a class="link-disabled">Вперед</a>
            <?php
            }
            ?>
        </li>
    </ul>
<?php
}
?>
