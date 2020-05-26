<?php if($total > 1): ?>

<div class="pagination-layout1">
    <?php if(($pag - 1) > 0): ?>
        <div class="btn-prev disabled">
            <a href="<?= $url; ?>?pag=<?= ($pag - 1); ?>">
                <i class="fas fa-angle-double-left"></i> Voltar
            </a>
        </div>
    <?php endif; ?>



    <div class="page-number">
        <?php for($i = ($pag - 4); $i <= ($pag + 4); $i++): ?>
            <?php if($i > 0 && $i <= $total): ?>
                <a href="<?= $url; ?>?pag=<?= $i; ?>" class="<?php if($i == $pag){echo 'active';} ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>


    <?php if(($pag + 1) <= $total): ?>
        <div class="btn-next">
            <a href="<?= $url; ?>?pag=<?= ($pag + 1); ?>">
                Próximo <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    <?php endif; ?>
</div>

<?php endif; ?>