<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('external_links', function (Blueprint $table) {
            $table->string('display_title')->nullable()->after('title');
            $table->text('full_description')->nullable()->after('excerpt');

            // Company Overview
            $table->string('headquarters')->nullable()->after('full_description');
            $table->string('employee_count')->nullable()->after('headquarters');
            $table->text('main_products')->nullable()->after('employee_count');
            $table->string('industry')->nullable()->after('main_products');
            $table->string('country')->nullable()->after('industry');
            $table->string('website_url')->nullable()->after('country');

            // Ownership and Control
            $table->string('controlling_shareholder')->nullable()->after('website_url');
            $table->string('controlling_shareholder_percentage')->nullable()->after('controlling_shareholder');
            $table->string('ultimate_controller')->nullable()->after('controlling_shareholder_percentage');
            $table->string('ultimate_controller_percentage')->nullable()->after('ultimate_controller');
            $table->string('company_nature')->nullable()->after('ultimate_controller_percentage');

            // Governance Structure
            $table->string('chairman')->nullable()->after('company_nature');
            $table->string('ceo')->nullable()->after('chairman');
            $table->text('key_directors')->nullable()->after('ceo');
            $table->text('governance_notes')->nullable()->after('key_directors');

            // SEO / Metadata
            $table->string('meta_title')->nullable()->after('governance_notes');
            $table->string('meta_description')->nullable()->after('meta_title');
        });

        // external_url is now optional — website_url (Company Overview) can stand in,
        // and admins may leave both blank until a confirmed link is available.
        DB::statement('ALTER TABLE external_links ALTER COLUMN url DROP NOT NULL');
    }

    public function down(): void
    {
        DB::statement("UPDATE external_links SET url = '' WHERE url IS NULL");
        DB::statement('ALTER TABLE external_links ALTER COLUMN url SET NOT NULL');

        Schema::table('external_links', function (Blueprint $table) {
            $table->dropColumn([
                'display_title',
                'full_description',
                'headquarters',
                'employee_count',
                'main_products',
                'industry',
                'country',
                'website_url',
                'controlling_shareholder',
                'controlling_shareholder_percentage',
                'ultimate_controller',
                'ultimate_controller_percentage',
                'company_nature',
                'chairman',
                'ceo',
                'key_directors',
                'governance_notes',
                'meta_title',
                'meta_description',
            ]);
        });
    }
};
