
<?php if (isset($audits) && count($audits)) : ?>
    <tbody>
        <?php foreach ($audits as $audit) : ?>
            <tr>
            <td class="min-w-70px">

                    <?php if($audit->event =='insert'){ ?>
                        <div class="badge badge-light-success"><?= $audit->event ?></div>
                    <?php }else  if($audit->event =='update'){ ?>
                        <div class="badge badge-light-warning"><?= $audit->event ?></div>
                    <?php }else{ ?>
                        <div class="badge badge-light-danger"><?= $audit->event ?></div>
                    <?php } ?>

                </td>
                <td class="min-w-70px">
                    <?= $audit->source ?? '' ?>
                </td>
                <?php if(!empty($audit->properties)){ ?>
                    <td class="min-w-70px">
                    <td><?php $data = json_decode($audit->properties); ?> id : <?=  (!is_array($data->id) && !empty($data)) ? $data->id : $data->id[0]; ?></td>
                    </td>
                <?php }else{ ?>
                    <td> -- </td>
                <?php } ?>

                <td class="pe-0 text-end min-w-200px"><?= \CodeIgniter\I18n\Time::parse($audit->created_at)->humanize() ?></td>
                
            </tr>
        <?php endforeach ?>
    </tbody>
<?php else : ?>
    <div class="alert alert-secondary"><?= ucfirst(lang('Core.NoRecentData')); ?>.</div>
<?php endif ?>


