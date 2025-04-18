<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        settings()->group('general')->set([
            'site_name' => 'Alma',
            'site_language' => 'en',
            'site_maintenance_mode' => false,
            'email_verification_active' => false,
            'site_logo' => '',
            'site_logo_dark' => '',
            'site_favicon' => '',
        ]);
        settings()->group('seo')->set([
            'meta_title' => 'Alma test',
            'meta_description' => 'Alma demo meta description',
            'meta_keywords' => 'Alma, news, business, technology, ideas, growth models, startups',
            'og_site_name' => 'alma.devklan.com',
            'og_title' => 'alma.com — business, technologies, ideas, growth models',
            'og_description' => 'IT market news, startups, advertising, PR, interfaces, business, technologies, ideas, mobile applications.',
            'og_url' => 'https://alma.devklan.com/',
            'og_type' => 'website',
            'og_image' => '',
            'sitemap_update' => '',
        ]);
        settings()->group('advanced')->set([
            'points_system_active' => true,
            'recaptcha_active' => false,
            'facebook_login_active' => false,
            'google_login_active' => false,
            'adsense_active' => false,
            'current_file_storage' => 'local',
            'current_mail_driver' => 'log',
            'google_analytics_code' => '',
            'custom_head_code' => '',
            'custom_footer_code' => '',
            'adsense_client_id' => '',
        ]);

        settings()->group('smtp')->set([
            'status' => false,
            'mailer' => 'smtp',
            'host' => '',
            'port' => '',
            'username' => '',
            'password' => '',
            'encryption' => '',
            'from_address' => '',
            'from_name' => '',
        ]);

        settings()->group('social_media_links')->set([
            'youtube' => '',
            'x' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => '',
            'twitch' => '',
            'telegram' => '',
            'vk' => '',
            'discord' => '',
            'linkedin' => '',
        ]);
    }
}
