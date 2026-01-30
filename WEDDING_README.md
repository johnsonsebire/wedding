# Wedding Website - Johnson's Marriage Blessing

A beautiful, modern wedding website built with Laravel 12, inspired by contemporary wedding invitation designs. This website includes sections for your love story, wedding details, RSVP functionality, gift information, and contact details.

## Features

- 🎨 **Beautiful Modern Design** - Elegant purple gradient theme with smooth animations
- ⏱️ **Live Countdown Timer** - Real-time countdown to the wedding day
- 📝 **RSVP System** - Guests can confirm attendance with contact information
- 💝 **Gift Information** - Details about gift options and contributions
- 📱 **Fully Responsive** - Works perfectly on all devices (mobile, tablet, desktop)
- ✨ **Smooth Animations** - Beautiful fade-in effects and smooth scrolling
- 📍 **Wedding Details** - Comprehensive information about venue, time, and schedule

## Sections Included

1. **Hero Section** - Couple names, wedding date, and countdown timer
2. **Our Love Story** - "How We Met" and "The Proposal" with statistics
3. **Wedding Details** - Venue, date, time, and timeline
4. **RSVP** - Interactive form for guest responses
5. **Gifts & Contributions** - Information about gift options
6. **Contact** - Contact information for the couple
7. **Footer** - Final message to guests

## Installation & Setup

### Prerequisites

- PHP 8.2 or higher
- Composer
- SQLite (included by default) or MySQL/PostgreSQL

### Step 1: Navigate to Project

The project is already created in `/home/johnsonsebire/johnson_wedding`

```bash
cd /home/johnsonsebire/johnson_wedding
```

### Step 2: Install Dependencies (Already Done)

Dependencies are already installed, but if needed:

```bash
composer install
```

### Step 3: Configure Environment

The `.env` file is already created. The website uses SQLite by default for simplicity.

### Step 4: Database Setup (Already Done)

Migrations have been run. To reset or re-run:

```bash
php artisan migrate:fresh
```

### Step 5: Start Development Server

```bash
php artisan serve
```

The website will be available at: `http://localhost:8000`

## Customization Guide

### 1. Update Wedding Information

Edit the following in [resources/views/wedding.blade.php](resources/views/wedding.blade.php):

**Couple Names** (Line 33):
```html
<h1 class="text-6xl md:text-8xl font-bold mb-4">Your Names Here</h1>
```

**Wedding Date** (Lines 35 & 401):
```html
<p id="wedding-date">{{ date('F d, Y', strtotime('2026-06-15')) }}</p>
```
```javascript
const weddingDate = new Date('2026-06-15T14:00:00').getTime();
```

**Venue Information** (Lines 153-163):
```html
<div class="text-gray-600">Your Church/Venue Name<br>Street Address<br>City, Country</div>
```

**RSVP Deadline** (Line 194):
```html
<div class="text-4xl font-bold text-purple-600">May 15, 2026</div>
```

### 2. Update Your Story

**How We Met** (Lines 107-110):
Replace the placeholder text with your actual story.

**The Proposal** (Lines 125-128):
Replace with your proposal story.

### 3. Update Statistics (Lines 91-106)

Change the numbers to reflect your relationship:
- Years Together
- Memories Made
- Any other personal stats

### 4. Add Photos

Replace the placeholder divs (Lines 112-116, 120-124) with actual images:

```html
<img src="{{ asset('images/your-photo.jpg') }}" alt="Photo description" class="w-full h-64 object-cover rounded-lg">
```

Place images in: `public/images/`

### 5. Update Contact Information (Lines 297-326)

Replace names, phone numbers, and email addresses with your actual contact information.

### 6. Change Color Scheme

The site uses a purple gradient theme. To change colors, update the Tailwind classes:

- `purple-600` → your color (e.g., `blue-600`, `pink-600`)
- `.hero-gradient` in the `<style>` section (Line 15)

### 7. Customize Timeline (Lines 167-179)

Update the wedding day schedule with your actual timeline.

## Database Structure

### RSVPs Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar | Guest name (required) |
| email | varchar | Guest email (optional) |
| phone | varchar | Guest phone (optional) |
| guests | integer | Number of guests (default: 1) |
| attending | boolean | Attendance status (default: true) |
| message | text | Guest message (optional) |
| created_at | timestamp | Creation time |
| updated_at | timestamp | Last update time |

## Viewing RSVPs

To view RSVP responses, you can use Laravel Tinker or create an admin panel.

### Using Tinker:

```bash
php artisan tinker
```

Then run:
```php
App\Models\Rsvp::all();
// or
App\Models\Rsvp::where('attending', true)->get();
```

### Export to CSV:

```bash
php artisan tinker
```

```php
$rsvps = App\Models\Rsvp::all();
$csv = fopen('rsvps.csv', 'w');
fputcsv($csv, ['Name', 'Email', 'Phone', 'Guests', 'Attending', 'Message', 'Date']);
foreach($rsvps as $rsvp) {
    fputcsv($csv, [
        $rsvp->name,
        $rsvp->email,
        $rsvp->phone,
        $rsvp->guests,
        $rsvp->attending ? 'Yes' : 'No',
        $rsvp->message,
        $rsvp->created_at
    ]);
}
fclose($csv);
```

## Deployment

### Option 1: Traditional Hosting (cPanel, Shared Hosting)

1. Upload all files to your hosting
2. Set document root to `/public`
3. Create database and update `.env`
4. Run migrations via SSH or artisan commands

### Option 2: Cloud Platforms

**Laravel Forge/Vapor:**
- Connect your repository
- Deploy automatically

**Heroku:**
```bash
heroku create your-wedding-app
git push heroku main
heroku run php artisan migrate
```

**DigitalOcean/AWS/Google Cloud:**
- Use Laravel deployment guides for your chosen platform

## Technologies Used

- **Laravel 12** - PHP Framework
- **Tailwind CSS** - Utility-first CSS framework (via CDN)
- **SQLite** - Database (can be switched to MySQL/PostgreSQL)
- **Vanilla JavaScript** - For countdown timer and form handling
- **Google Fonts** - Playfair Display & Lato fonts

## Support

For issues or questions about customization:
1. Check Laravel documentation: https://laravel.com/docs
2. Tailwind CSS documentation: https://tailwindcss.com/docs
3. Review the code comments in the template

## License

This is a custom wedding website template. Feel free to modify and use for your personal wedding.

---

## Quick Customization Checklist

- [ ] Update couple names
- [ ] Set wedding date and time
- [ ] Update venue information
- [ ] Write your love story (How We Met & Proposal)
- [ ] Add your photos
- [ ] Update contact information
- [ ] Set RSVP deadline
- [ ] Customize timeline
- [ ] Update statistics
- [ ] Change colors (optional)
- [ ] Test RSVP form
- [ ] Add Google Maps link

---

Made with ❤️ for Johnson's Marriage Blessing
