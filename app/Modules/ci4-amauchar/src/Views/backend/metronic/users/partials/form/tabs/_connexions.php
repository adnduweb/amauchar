<?php if (isset($logins) && count($logins)) : ?>
    <tbody>
        <?php foreach ($logins as $login) : ?>
            <tr>
                <td><?= \CodeIgniter\I18n\Time::parse($login->date); ?></td>
                <td><?= $login->ip_address ?? '' ?></td>
                <td><?php $result = new WhichBrowser\Parser($login->user_agent); echo $result->toString() ?? '' ?></td>
                <td>
                    <?php if ($login->success) : ?>
                        <span class="badge badge-light-success">Success</span>
                    <?php else : ?>
                        <span class="badge badge-light-secondary">Failed</span>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
<?php else : ?>
    <div class="alert alert-secondary"><?= ucfirst(lang('Core.NoRecentData')); ?>.</div>
<?php endif ?>