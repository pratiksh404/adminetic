<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    // use Queueable;

    // Constants

    // Actions
    const BROWSE = 'Browse';
    const READ = 'Read';
    const EDIT = 'Edit';
    const ADD = 'Add';
    const DELETE = 'Delete';

    // Severity
    const INSIGNIFICANT = 0;
    const LOW = 1;
    const MID = 2;
    const HIGH = 3;
    const VERYHIGH = 4;

    // From
    const FROM_SYSTEM = 1;
    const FROM_USER = 2;

    // Type
    const INFO = 1;
    const ALERT = 2;
    const REMINDER = 3;
    const MESSAGE = 4;
    const WARNING = 5;
    const NEWS = 6;
    const REPORT = 7;

    public $title;

    public $message;

    public $action;

    public $url;

    public $subject;

    public $color;

    public $type;

    public $category;

    public $severity;

    public $from;

    public $icon = 'fa fa-bell';

    public $is_snoozed = false;

    public $alram = null;

    public $body;

    public $channels;

    public $audiance;

    // Notification Display Setting
    public $allow_dismiss = true;
    public $newest_on_top = true;
    public $mouse_over = false;
    public $showProgressbar = false;
    public $spacing = 10;
    public $timer = 8000;
    public $placement_from = 'bottom';
    public $placement_align = 'right';
    public $delay = 1000;
    public $animate_enter = 'bounceIn';
    public $animate_exit = 'rubberBand';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->body = $data;
        $this->title = $data['title'] ?? 'System Notification';
        $this->message = $data['message'] ?? 'Message not found.';
        $this->action = $data['action'] ?? null;
        $this->color = $data['color'] ?? 'primary';
        $this->url = $data['url'] ?? null;
        $this->category = $data['category'] ?? 'General';
        $this->type = $data['type'] ?? 1;
        $this->severity = $data['severity'] ?? 1;
        $this->from = $data['from'] ?? 1;
        $this->icon = $data['icon'] ?? 'fa fa-bell';
        $this->is_snoozed = $data['is_snoozed'] ?? false;
        $this->alram = $data['alram'] ?? null;
        $this->channels = $data['channels'] ?? null;
        $this->audiance = $data['audiance'] ?? null;

        // Notification Display Setting
        $this->allow_dismiss = $data['allow_dismiss'] ?? true;
        $this->newest_on_top = $data['newest_on_top'] ?? true;
        $this->mouse_over = $data['mouse_over'] ?? false;
        $this->showProgressbar = $data['showProgressbar'] ?? false;
        $this->spacing = $data['spacing'] ?? 10;
        $this->timer = $data['timer'] ?? 8000;
        $this->placement_from = $data['placement_from'] ?? 'bottom';
        $this->placement_align = $data['placement_align'] ?? 'right';
        $this->delay = $data['delay'] ?? 1000;
        $this->animate_enter = $data['animate_enter'] ?? 'bounceIn';
        $this->animate_exit = $data['animate_exit'] ?? 'rubberBand';

        $this->subject = $data['subject'] ?? (($this->action ?? 'General').' Notification : '.$this->title);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->body['channels'] ?? general_notification_mediums();
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->line($this->subject)
            ->line($this->message)
            ->line('From '.title());
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->body;
    }
}
