<?php if (isset($sessions) && count($sessions)) : ?>
    <tbody>
        <?php foreach ($sessions as $session) : ?>
            <tr>
                <td><?= \CodeIgniter\I18n\Time::createFromTimestamp($session->timestamp)->humanize() ?></td>
                <td><?= $session->ip_address ?? '' ?></td>
                <td>
                    <?php $result = new WhichBrowser\Parser($session->user_agent); echo $result->toString() ?? '' ?>
                    <span class="text-muted fw-bold text-muted d-block fs-7"><?= $result->browser->name; ?> | <?= $result->device->model; ?><br/> <small><?= $result->os->toString(); ?></small></span>
                </td>
                <td>
                    <?php if($session->id != session_id() ){ ?>
                        <a href="#" data-kt-users-sign-out="single_user">Sign out</a>
                    <?php }else  if($session->id == session_id() ){ ?>
                        <span class="badge badge-light-success">Current Session</span>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
<?php else : ?>
    <div class="alert alert-secondary">No recent login sessions.</div>
<?php endif ?>