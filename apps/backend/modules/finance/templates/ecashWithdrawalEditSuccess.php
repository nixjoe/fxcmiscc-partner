<?php
// auto-generated by sfPropelCrud
// date: 2012/04/20 19:13:40
?>
<?php use_helper('Object') ?>
<?php use_helper('I18N') ?>
<!-- TinyMCE -->
<script type="text/javascript">
    $(function() {
        $("#btnSave").button({
            icons: {
                primary: "ui-icon-circle-check"
            }
        })

        $("#btnCancel").button({
            icons: {
                primary: "ui-icon-circle-arrow-w"
            }
        }).click(function(){
            $("#withdrawForm").attr("action", "<?php echo url_for("/finance/ecashWithdrawal")?>");
        });
    });
</script>

<?php echo form_tag('finance/updateWithdrawal', 'id=withdrawForm') ?>

<?php echo object_input_hidden_tag($mlm_ecash_withdraw, 'getWithdrawId') ?>

<div style="padding: 10px; top: 10px; width: 95%">
    <div class="portlet">
        <div class="portlet-header">e-Cash Withdrawal Details</div>
        <div class="portlet-content">
            <table class="sf_admin_list" cellpadding="3" width="100%">
                <tbody>
                <tr>
                    <td colspan="2">
                        <?php if ($sf_flash->has('successMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                                    <strong><?php echo $sf_flash->get('successMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($sf_flash->has('errorMsg')): ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                                    <strong><?php echo $sf_flash->get('errorMsg') ?></strong></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th class="caption">Distributor Code :</th>
                    <td class="value"><?php
                        $existDist = MlmDistributorPeer::retrieveByPK($mlm_ecash_withdraw->getDistId());
                        $existPackage = MlmPackagePeer::retrieveByPK($existDist->getRankId());
                        $existMt4Package = MlmPackagePeer::retrieveByPK($existDist->getMt4RankId());
                        echo $existDist->getDistributorCode() ?></td>
                </tr>
                <tr>
                    <th class="caption">Full Name :</th>
                    <td class="value"><?php
                        echo $existDist->getFullName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Ranking :</th>
                    <td class="value"><?php
                        echo $existPackage->getPackageName()." (".number_format($existPackage->getPrice(),2).")" ?></td>
                </tr>
                <tr>
                    <th class="caption">MT4 Ranking :</th>
                    <td class="value"><?php
                        echo $existMt4Package->getPackageName()." (".number_format($existMt4Package->getPrice(),2).")" ?></td>
                </tr>
                <tr>
                    <th class="caption">Withdrawal Amount *:</th>
                    <td class="value"><?php echo object_input_tag($mlm_ecash_withdraw, 'getDeduct', array(
                                                                                           'size' => 7,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr>
                    <th class="caption">Requested Date Time :</th>
                    <td class="value"><?php
                        echo $mlm_ecash_withdraw->getCreatedOn() ?></td>
                </tr>
                <tr>
                    <th class="caption">Approve / Reject Date Time :</th>
                    <td class="value"><?php
                        echo $mlm_ecash_withdraw->getApproveRejectDatetime() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank in to *:</th>
                    <td class="value"><?php echo object_input_tag($mlm_ecash_withdraw, 'getBankInTo', array(
                                                                                           'size' => 20,
                                                                                            'readonly' => 'readonly',
                                                                                      )) ?></td>
                </tr>
                <tr>
                    <th class="caption">Status code:</th>
                    <td class="value"><?php
                        $arr = array();
                        $arr['PENDING'] = 'PENDING';
                        $arr['PROCESSING'] = 'PROCESSING';
                        $arr['REJECTED'] = 'REJECTED';
                        $arr['PAID'] = 'PAID';
                        echo select_tag('status_code', options_for_select($arr, $mlm_ecash_withdraw->getStatusCode()));
                     ?></td>
                </tr>
                <tr>
                    <th class="caption">Remarks:</th>
                    <td class="value"><?php echo object_textarea_tag($mlm_ecash_withdraw, 'getRemarks', array(
                                                                                                          'size' => '30x3',
                                                                                                     )) ?></td>
                </tr>
                </tbody>
            </table>
            <hr/>
            <?php if ($sf_user->hasCredential(array(AP::AL_READONLY), false)) {
            } else {
                if ($mlm_ecash_withdraw->getStatusCode() == 'PENDING' || $mlm_ecash_withdraw->getStatusCode() == 'PROCESSING') {
            ?>
            <button id="btnSave">Save</button>
            <?php } ?>
            <?php } ?>
            <button id="btnCancel">Cancel</button>
            &nbsp;<?php //echo link_to('cancel', 'finance/ecashWithdrawal', array("id" => "btnCancel")) ?>

            <br>
            <br>
            <table class="sf_admin_list" cellpadding="3" width="100%">
                <tbody>

                <tr>
                    <th class="caption">Bank Name :</th>
                    <td class="value"><?php
                        echo $existDist->getBankName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Account Number :</th>
                    <td class="value"><?php
                        echo $existDist->getBankAccNo() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Account Holder Name :</th>
                    <td class="value"><?php
                        echo $existDist->getBankHolderName() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Address :</th>
                    <td class="value"><?php
                        echo $existDist->getBankAddress() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Branch :</th>
                    <td class="value"><?php
                        echo $existDist->getBankBranch() ?></td>
                </tr>
                <tr>
                    <th class="caption">Bank Swift Code / ABA :</th>
                    <td class="value"><?php
                        echo $existDist->getBankSwiftCode() ?></td>
                </tr>
                <tr>
                    <th class="caption">Visa Debit Card :</th>
                    <td class="value"><?php
                        echo $existDist->getVisaDebitCard() ?></td>
                </tr>
                <tr>
                    <th class="caption"></th>
                    <td class="value"></td>
                </tr>

                <tr>
                    <th class="caption">Country :</th>
                    <td class="value"><?php
                        echo $existDist->getCountry() ?></td>
                </tr>
                <tr>
                    <th class="caption">Address :</th>
                    <td class="value"><?php
                        echo $existDist->getAddress() ?></td>
                </tr>
                <tr>
                    <th class="caption">Address 2 :</th>
                    <td class="value"><?php
                        echo $existDist->getAddress2() ?></td>
                </tr>
                <tr>
                    <th class="caption">City / Town :</th>
                    <td class="value"><?php
                        echo $existDist->getCity() ?></td>
                </tr>
                <tr>
                    <th class="caption">State / Province :</th>
                    <td class="value"><?php
                        echo $existDist->getState() ?></td>
                </tr>
                <tr>
                    <th class="caption">Zip / Postal Code :</th>
                    <td class="value"><?php
                        echo $existDist->getPostcode() ?></td>
                </tr>

                <tr>
                    <th class="caption"></th>
                    <td class="value"></td>
                </tr>
                <tr>
                    <th class="caption">Bank Account Proof :</th>
                    <td class="value"><?php
                        if ($existDist->getFileBankPassBook() != "") {
                            echo "<a href='" . url_for("/marketing/downloadBankPassBook") ."?q=" . $existDist->getDistributorId() . "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                        }
                        ?></td>
                </tr>
                <tr>
                    <th class="caption">Proof of Residence :</th>
                    <td class="value"><?php
                        if ($existDist->getFileProofOfResidence() != "") {
                            echo "<a href='" . url_for("/marketing/downloadProofOfResidence") ."?q=" . $existDist->getDistributorId() . "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                        }
                        ?></td>
                </tr>
                <tr>
                    <th class="caption">NRIC :</th>
                    <td class="value"><?php
                        if ($existDist->getFileNric() != "") {
                            echo "<a href='" . url_for("/marketing/downloadNric") ."?q=" . $existDist->getDistributorId() . "'><img src='/images/common/fileopen.png' alt='view file'></a>";
                        }
                        ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</form>