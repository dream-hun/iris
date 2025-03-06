<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'home_title' => 'Welcome to Irispicture',
                'home_description' => 'Capturing life\'s precious moments with artistic excellence and professional expertise.',
                'home_button_text' => 'Discover More',
                'about_us_header' => 'About Us',
                'about_us_description' => 'Irispicture is a professional photography studio dedicated to creating timeless memories through exceptional photography services.',
                'mission_header' => 'Our Mission',
                'mission_description' => 'To provide outstanding photography services that capture the essence of every moment, delivering high-quality images that tell your unique story.',
                'vision_header' => 'Our Vision',
                'vision_description' => 'To be the leading photography studio known for creativity, innovation, and exceptional customer service.',
                'gallery_or_portfolio_title' => 'Our Gallery',
                'gallery_or_portfolio_description' => 'Explore our diverse portfolio showcasing our best work across various photography styles and occasions.',
                'booking_title' => 'Book a Session',
                'booking_title_description' => 'Ready to capture your special moments? Book a session with us today!',
                'booking_title_address' => 'Visit Our Studio',
                'booking_description_address' => 'Find us at our conveniently located studio. Contact us to schedule your visit.',
            ],
        ];

        foreach ($pages as $page) {
            \App\Models\Page::create($page);
        }
    }
}
