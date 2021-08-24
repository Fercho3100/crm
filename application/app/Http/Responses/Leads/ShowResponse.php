<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [show] process for the leads
 * controller
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Leads;
use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //full payload array
        $payload = $this->payload;

        // RIGHT PANEL---
        $html = view('pages/lead/rightpanel', compact('page', 'lead', 'assigned', 'sources', 'statuses', 'tags', 'categories', 'fields'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card--leads-right-panel',
            'action' => 'replace',
            'value' => $html);

        // LEFT PANEL---
        $html = view('pages/lead/leftpanel', compact('page', 'lead', 'progress'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-leads-left-panel',
            'action' => 'replace',
            'value' => $html);

        // COMMENTS---
        $html = view('pages/lead/components/comment', compact('comments'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-comments-container',
            'action' => 'replace',
            'value' => $html);

        // ATTACHMENTS---
        $html = view('pages/lead/components/attachment', compact('attachments'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-attachments-container',
            'action' => 'replace',
            'value' => $html);

        // CHECKLISTS---
        $html = view('pages/lead/components/checklist', compact('checklists', 'progress'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-checklists-container',
            'action' => 'replace',
            'value' => $html);

        // CHECKLIST PROGRESS---
        $html = view('pages/lead/components/progressbar', compact('progress'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#card-checklist-progress-container',
            'action' => 'replace',
            'value' => $html);

        // CONVERT FOOTER---
        $html = view('pages/lead/components/footer', compact('lead'))->render();
        $jsondata['dom_html'][] = array(
            'selector' => '#leadConvertToCustomerFooter',
            'action' => 'replace',
            'value' => $html);

        //HIDE NOTIFICATION ICONS ON CARDS
        $jsondata['dom_visibility'][] = [
            'selector' => "#card_notification_attachment_$id",
            'action' => 'hide',
        ];
        $jsondata['dom_visibility'][] = [
            'selector' => "#card_notification_comment_$id",
            'action' => 'hide',
        ];

        // SHOW MODAL------
        $jsondata['dom_classes'][] = [
            'selector' => '#cardModalContent',
            'action' => 'remove',
            'value' => 'hidden',
        ];

        //update browser url
        $jsondata['dom_browser_url'] = [
            'title' => __('lang.lead') . ' - ' . $lead->lead_title,
            'url' => url("/leads/v/" . $lead->lead_id . "/" . str_slug($lead->lead_title)),
        ];

        // POSTRUN FUNCTIONS------
        $jsondata['postrun_functions'][] = [
            'value' => 'NXLeadConvert',
        ];

        // POSTRUN FUNCTIONS------
        $jsondata['postrun_functions'][] = [
            'value' => 'NXLeadAttachFiles',
        ];

        // POSTRUN FUNCTIONS------
        $jsondata['postrun_functions'][] = [
            'value' => 'NXBootCards',
        ];

        //ajax response
        return response()->json($jsondata);

    }

}
