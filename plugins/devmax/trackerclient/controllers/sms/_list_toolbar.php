<div data-control="toolbar">
    <a href="<?= Backend::url('devmax/trackerclient/sms/create') ?>" class="btn btn-primary oc-icon-plus">
        <?= e(trans('backend::lang.form.create')) ?>
    </a>
    <button class="btn btn-default oc-icon-trash-o" data-request="onDelete"
        data-request-confirm="<?= e(trans('backend::lang.list.delete_selected_confirm')) ?>" data-list-checked-trigger
        data-list-checked-request data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>

    <!-- Добавляем кнопку "Send SMS" -->

    <button class="btn btn-primary oc-icon-plus" data-request="onHandleAction"
        data-request-data='{"action": "sendSms"}'>
        Send SMS
    </button>

    <script>
        console.log('start')
        $(document).ready(function () {
            $('[data-request="onHandleAction"]').click(function () {
                var requestData = $(this).data('request-data');
                console.log('requestData', requestData);
                var action = requestData.action;
                console.log('action', action)
                if (action) {
                    var selectedIds = $('[name="checked[]"]:checked').map(function () {
                        return $(this).val();
                    }).get();



                    if (selectedIds.length > 0) {
                        console.log('selectedIds', selectedIds)
                        $.request('onHandleAction', {
                            data: { selectedIds: selectedIds },
                            success: function (response) {
                                if (response.message) {
                                    alert(response.message);
                                }
                            }
                        });
                    } else {
                        alert('Выберите клиентов для отправки SMS.');
                    }
                }
            });
        });
    </script>
</div>