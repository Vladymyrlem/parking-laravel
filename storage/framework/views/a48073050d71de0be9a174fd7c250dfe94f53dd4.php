<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_contact" name="btn_add" class="btn btn-default pull-right">Add New Contacts Data</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phones</th>
                <th>Coordinates</th>
                <th>Google Map Link</th>
            </tr>
            </thead>
            <tbody id="contacts-list" name="contacts-list">
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="contact-<?php echo e($contact->id); ?>" class="active">
                    <td><?php echo e($contact->id); ?></td>
                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e($contact->address); ?></td>
                    <td><?php echo e($contact->phone_number_1); ?><br><?php echo e($contact->phone_number_2); ?></td>
                    <td><?php echo e($contact->latitude); ?>','&nbsp;<?php echo e($contact->longitude); ?></td>
                    <td><a href="<?php echo e($contact->map_link); ?>" target="_blank">Link to google map</a></td>
                    <td width="100">
                        <button class="btn btn-warning btn-detail open_contacts_modal" value="<?php echo e($contact->id); ?>">Edit</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/contacts/table.blade.php ENDPATH**/ ?>