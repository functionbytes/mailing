<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ErpController;
use App\Http\Controllers\Api\Mailing\AbTestController;
use App\Http\Controllers\Api\Mailing\ApiBatchController;
use App\Http\Controllers\Api\Mailing\AutomationController;
use App\Http\Controllers\Api\Mailing\BlacklistImportController;
use App\Http\Controllers\Api\Mailing\BounceController;
use App\Http\Controllers\Api\Mailing\BulkEmailController;
use App\Http\Controllers\Api\Mailing\CampaignController;
use App\Http\Controllers\Api\Mailing\CampaignFoldersController;
use App\Http\Controllers\Api\Mailing\CustomFieldController;
use App\Http\Controllers\Api\Mailing\EmailController;
use App\Http\Controllers\Api\Mailing\GroupController;
use App\Http\Controllers\Api\Mailing\ImportController;
use App\Http\Controllers\Api\Mailing\MediaFileController;
use App\Http\Controllers\Api\Mailing\MediaFolderController;
use App\Http\Controllers\Api\Mailing\RssCampaignController;
use App\Http\Controllers\Api\Mailing\SegmentController;
use App\Http\Controllers\Api\Mailing\SenderController;
use App\Http\Controllers\Api\Mailing\SentCampaignController;
use App\Http\Controllers\Api\Mailing\SignupFormController;
use App\Http\Controllers\Api\Mailing\SmsCampaignController;
use App\Http\Controllers\Api\Mailing\SmsSentMessagesController;
use App\Http\Controllers\Api\Mailing\SmsTransactionalController;
use App\Http\Controllers\Api\Mailing\SmtpEmailController;
use App\Http\Controllers\Api\Mailing\SmtpTagController;
use App\Http\Controllers\Api\Mailing\SubscriberController;
use App\Http\Controllers\Api\Mailing\SystemInfoController;
use App\Http\Controllers\Api\Mailing\TemplateController;
use App\Http\Controllers\Api\Mailing\UnsubscribeEventController;
use App\Http\Controllers\Api\SubscribersController;
use App\Http\Controllers\Api\System\ActivityLogController;
use App\Http\Controllers\Api\TicketsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'subscribers'], function () {
    Route::post('/', [SubscribersController::class, 'process']);
    Route::put('/replace', [SubscribersController::class, 'replace']);
    Route::patch('patch', [SubscribersController::class, 'update']);
    Route::post('process', [SubscribersController::class, 'process']);
    Route::post('campaigns', [SubscribersController::class, 'campaigns']);
});


Route::group(['prefix' => 'subscribers'], function () {
    Route::post('/', [SubscribersController::class, 'process']);
    Route::put('/replace', [SubscribersController::class, 'replace']);
    Route::patch('patch', [SubscribersController::class, 'update']);
    Route::post('process', [SubscribersController::class, 'process']);
    Route::post('campaigns', [SubscribersController::class, 'campaigns']);
    Route::get('synchronization', [SubscribersController::class, 'synchronization']);
});

Route::middleware('auth:sanctum')->group(function() {

    Route::apiResource('tickets', TicketsController::class)->except(['update']);
    Route::put('tickets/{ticket}', [TicketsController::class, 'replace']);
    Route::patch('tickets/{ticket}', [TicketsController::class, 'update']);

});



Route::prefix('campaigns')->group(function () {
    Route::post('/', [CampaignController::class, 'create']);
    Route::get('{id}', [CampaignController::class, 'get']);
    Route::delete('{id}', [CampaignController::class, 'delete']);
    Route::patch('{id}', [CampaignController::class, 'update']);
    Route::post('{id}/send_all', [CampaignController::class, 'sendAll']);
    Route::post('{id}/send_test', [CampaignController::class, 'sendTest']);
});


Route::prefix('campaignfolders')->group(function () {
    Route::get('/', [CampaignFoldersController::class, 'index']);
    Route::get('/{id}', [CampaignFoldersController::class, 'show']);
    Route::post('/', [CampaignFoldersController::class, 'store']);
    Route::patch('/{id}', [CampaignFoldersController::class, 'update']);
    Route::delete('/{id}', [CampaignFoldersController::class, 'destroy']);
});

Route::prefix('customfields')->group(function () {
    Route::get('/', [CustomFieldController::class, 'index']);
    Route::get('/{id}', [CustomFieldController::class, 'show']);
    Route::post('/', [CustomFieldController::class, 'store']);
    Route::patch('/{id}', [CustomFieldController::class, 'update']);
    Route::delete('/{id}', [CustomFieldController::class, 'destroy']);
});


Route::prefix('groups')->group(function () {
    Route::get('/', [GroupController::class, 'index']);
    Route::get('/{id}', [GroupController::class, 'show']);
    Route::post('/', [GroupController::class, 'store']);
    Route::patch('/{id}', [GroupController::class, 'update']);
    Route::delete('/{id}', [GroupController::class, 'destroy']);
});

Route::prefix('subscribers')->group(function () {
    Route::get('/', [SubscriberController::class, 'index']);
    Route::get('/{id}', [SubscriberController::class, 'show']);
    Route::post('/', [SubscriberController::class, 'store']);
    Route::patch('/{id}', [SubscriberController::class, 'update']);
    Route::delete('/{id}', [SubscriberController::class, 'destroy']);
    Route::patch('/{id}/restore', [SubscriberController::class, 'restore']);
    Route::patch('/{id}/ban', [SubscriberController::class, 'ban']);
    Route::post('/{id}/resend_confirmation_email', [SubscriberController::class, 'resendConfirmation']);
});


Route::prefix('bounces')->group(function () {
    Route::delete('/', [BounceController::class, 'delete']);
});

Route::prefix('api-batches')->group(function () {
    Route::get('/', [ApiBatchController::class, 'index']);
    Route::get('/{id}', [ApiBatchController::class, 'show']);
    Route::post('/', [ApiBatchController::class, 'store']);
});

Route::prefix('unsubscribe')->group(function () {
    Route::get('/', [UnsubscribeEventController::class, 'index']);
    Route::get('/{id}', [UnsubscribeEventController::class, 'show']);
    Route::post('/', [UnsubscribeEventController::class, 'store']);
    Route::delete('/{id}', [UnsubscribeEventController::class, 'destroy']);
});

Route::prefix('smtpemails')->group(function () {
    Route::get('/', [SmtpEmailController::class, 'index']);
    Route::get('/{id}', [SmtpEmailController::class, 'show']);
});


Route::prefix('smtp-tags')->group(function () {
    Route::get('/', [SmtpTagController::class, 'index']);
});

Route::prefix('signup-forms')->group(function () {
    Route::get('/', [SignupFormController::class, 'index']);
});

Route::prefix('send-emails')->group(function () {
    Route::get('/', [EmailController::class, 'send']);
});

Route::prefix('sent-campaigns')->group(function () {
    Route::get('/', [SentCampaignController::class, 'index']);
    Route::get('/{id}', [SentCampaignController::class, 'show']);
    Route::patch('/{id}/cancel', [SentCampaignController::class, 'cancel']);
    Route::patch('/{id}/pause', [SentCampaignController::class, 'pause']);
    Route::patch('/{id}/resume', [SentCampaignController::class, 'resume']);
    Route::get('/{id}/clicks', [SentCampaignController::class, 'clicks']);
    Route::get('/{id}/impressions', [SentCampaignController::class, 'impressions']);
    Route::get('/{id}/sent_emails', [SentCampaignController::class, 'sentEmails']);
    Route::get('/{id}/unsubscribe_events', [SentCampaignController::class, 'unsubscribeEvents']);
});


Route::prefix('senders')->group(function () {
    Route::get('/', [SenderController::class, 'index']);
    Route::get('/{id}', [SenderController::class, 'show']);
    Route::post('/', [SenderController::class, 'store']);
    Route::patch('/{id}', [SenderController::class, 'update']);
    Route::delete('/{id}', [SenderController::class, 'destroy']);
    Route::post('/{id}/send_confirmation_email', [SenderController::class, 'sendConfirmationEmail']);
});

Route::prefix('media-files')->group(function () {
    Route::get('/', [MediaFileController::class, 'index']);
    Route::get('/{id}', [MediaFileController::class, 'show']);
    Route::post('/', [MediaFileController::class, 'store']);
    Route::delete('/{id}', [MediaFileController::class, 'destroy']);
    Route::patch('/{id}/move_to_trash', [MediaFileController::class, 'moveToTrash']);
    Route::patch('/{id}/restore', [MediaFileController::class, 'restore']);
    Route::get('/trashed', [MediaFileController::class, 'trashed']);
});

Route::prefix('media-folders')->group(function () {
    Route::get('/', [MediaFolderController::class, 'index']);
    Route::get('/{id}', [MediaFolderController::class, 'show']);
    Route::post('/', [MediaFolderController::class, 'store']);
    Route::patch('/{id}', [MediaFolderController::class, 'update']);
    Route::delete('/{id}', [MediaFolderController::class, 'destroy']);
});

Route::prefix('rss-campaigns')->group(function () {
    Route::get('/', [RssCampaignController::class, 'index']);
    Route::get('/{id}', [RssCampaignController::class, 'show']);
    Route::post('/', [RssCampaignController::class, 'store']);
    Route::patch('/{id}', [RssCampaignController::class, 'update']);
    Route::delete('/{id}', [RssCampaignController::class, 'destroy']);
    Route::get('/{id}/processed_entries', [RssCampaignController::class, 'processedEntries']);
});

Route::prefix('system')->group(function () {
    Route::get('/package', [SystemInfoController::class, 'getPackage']);
    Route::get('/ping', [SystemInfoController::class, 'ping']);
    Route::get('/stats', [SystemInfoController::class, 'getStats']);
});

Route::prefix('imports')->group(function () {
    Route::get('/', [ImportController::class, 'index']);
    Route::get('/{id}', [ImportController::class, 'show']);
    Route::post('/', [ImportController::class, 'store']);
    Route::patch('/{id}/cancel', [ImportController::class, 'cancel']);
    Route::get('/{id}/data', [ImportController::class, 'getImportData']);
});

Route::prefix('ab-tests')->group(function () {
    Route::get('/', [AbTestController::class, 'index']);
    Route::get('/{id}', [AbTestController::class, 'show']);
    Route::post('/', [AbTestController::class, 'store']);
    Route::delete('/{id}', [AbTestController::class, 'destroy']);
    Route::patch('/{id}/cancel', [AbTestController::class, 'cancel']);
    Route::post('/{id}/choose_winning_combination', [AbTestController::class, 'chooseWinningCombination']);
    Route::patch('/{id}/set_as_manual', [AbTestController::class, 'setAsManual']);
});

Route::prefix('automations')->group(function () {
    Route::get('/', [AutomationController::class, 'index']);
    Route::get('/{id}', [AutomationController::class, 'show']);
    Route::post('/', [AutomationController::class, 'store']);
    Route::patch('/{id}', [AutomationController::class, 'update']);
    Route::delete('/{id}', [AutomationController::class, 'destroy']);
    Route::patch('/{id}/toggle', [AutomationController::class, 'toggleAutomation']);
});

Route::prefix('templates')->group(function () {
    Route::get('/', [TemplateController::class, 'index']);
    Route::get('/{id}', [TemplateController::class, 'show']);
    Route::post('/', [TemplateController::class, 'store']);
    Route::patch('/{id}', [TemplateController::class, 'update']);
    Route::delete('/{id}', [TemplateController::class, 'destroy']);
});


Route::prefix('blacklist-imports')->group(function () {
    Route::get('/', [BlacklistImportController::class, 'index']);
    Route::get('/{id}', [BlacklistImportController::class, 'show']);
    Route::post('/', [BlacklistImportController::class, 'store']);
    Route::delete('/{id}', [BlacklistImportController::class, 'destroy']);
});

Route::prefix('segments')->group(function () {
    Route::get('/', [SegmentController::class, 'index']);
    Route::get('/{id}', [SegmentController::class, 'show']);
    Route::post('/', [SegmentController::class, 'store']);
    Route::patch('/{id}', [SegmentController::class, 'update']);
    Route::delete('/{id}', [SegmentController::class, 'destroy']);
});

Route::prefix('bulk-email')->group(function () {
    Route::post('/send', [BulkEmailController::class, 'send']);
});

Route::prefix('activity-logs')->group(function () {
    Route::get('/', [ActivityLogController::class, 'index']);
    Route::get('/{id}', [ActivityLogController::class, 'show']);
    Route::post('/', [ActivityLogController::class, 'store']);
});

Route::prefix('sms-campaigns')->group(function () {
    Route::get('/', [SmsCampaignController::class, 'index']);
    Route::get('/{id}', [SmsCampaignController::class, 'show']);
    Route::post('/', [SmsCampaignController::class, 'store']);
    Route::delete('/{id}', [SmsCampaignController::class, 'destroy']);
});

Route::get('sms-sent-messages', [SmsSentMessagesController::class, 'index']);
Route::get('sms-sent-messages/{id}', [SmsSentMessagesController::class, 'show']);

Route::post('sms-transactional/send', [SmsTransactionalController::class, 'send']);
