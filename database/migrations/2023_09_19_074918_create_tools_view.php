<?php
/**
 * @copyright (c) 2023 Ibookr.ai Kft.
 * 9022 Győr, Bajcsy-Zsilinszky út 44.
 * Phone: +36 96 524-748
 * Mobile: +36 30 436-1115
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS tools_view');
    }

    public function createView(): string
    {
        return <<<SQL
        CREATE OR REPLACE VIEW tools_view AS

        SELECT
            t.id                                                                        AS id,
            CASE
                WHEN t.owner_type = 'App\\\\Models\\\\Phone' THEN p.IMEI
                WHEN t.owner_type = 'App\\\\Models\\\\Notebook' THEN n.serial_number
                ELSE null
            END                                                                         AS serial_number,
            t.owner_type                                                                AS owner_type,
            t.owner_id                                                                  AS owner_id,
            t.user_id                                                                   AS user_id,
            t.status                                                                    AS status,
        t.created_at                                                                    AS created_at,
            t.updated_at                                                                AS updated_at,
            t.deleted_at                                                                AS deleted_at
        FROM
            tools t
            LEFT JOIN
                phones p ON t.owner_id = p.id
            LEFT JOIN
                notebooks n ON t.owner_id = n.id
        SQL;
    }
};
