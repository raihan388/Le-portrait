<?php
use Livewire\Component;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CustomNotificationBell extends Component
{
    public $unreadCount = 0;
    
    protected $listeners = ['notificationReceived' => 'updateCount'];
    
    public function mount()
    {
        $this->updateCount();
    }
    
    public function updateCount()
    {
        $this->unreadCount = Auth::user()
            ->unreadNotifications()
            ->count();
    }
    
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $this->updateCount();
        
        Notification::make()
            ->title('Semua notifikasi telah dibaca')
            ->success()
            ->send();
    }
    
    public function render()
    {
        return view('livewire.custom-notification-bell');
    }
}

// 4. Database Migration untuk Notifications
// File: database/migrations/xxxx_create_notifications_table.php



return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
?>