<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Importer les modèles nécessaires (à adapter à tes modèles réels)
use App\Models\Subject;
use App\Models\Student;
use App\Models\Course;
use App\Models\Announcement;
use App\Models\Subscription;
use App\Models\ZoomMeeting;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'subjectsCount' => Subject::count(),
            'studentsCount' => Student::count(),
            'coursesCount' => Course::count(),
            'newsCount' => Announcement::count(),
            'subscriptionsCount' => Subscription::count(),
            'zoomCount' => ZoomMeeting::count(),
            'adminsCount' => User::where('role', 'admin')->count(),
        ]);
    }
}
