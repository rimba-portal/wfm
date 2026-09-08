<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wfm_workforce_plans', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->unsignedBigInteger('org_corp_id')->nullable()->index();
            $table->date('period_start')->nullable();
            $table->date('period_end')->nullable();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('submitted_by_id')->nullable()->index();
            $table->dateTime('submitted_at')->nullable();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->dateTime('approved_at')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index(['org_corp_id', 'period_start', 'period_end'], 'wfm_plan_corp_period_idx');
        });

        Schema::create('wfm_workforce_requirements', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('workforce_plan_id')
                ->constrained('wfm_workforce_plans')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('org_unit_id')->nullable()->index();
            $table->unsignedBigInteger('org_team_id')->nullable()->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->unsignedInteger('required_count')->default(0);
            $table->unsignedInteger('current_count')->default(0);
            $table->unsignedSmallInteger('priority')->default(0);
            $table->date('effective_from')->nullable();
            $table->date('effective_to')->nullable();
            $table->string('status', 40)->default('draft')->index();
            $table->text('justification')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index(
                ['workforce_plan_id', 'org_unit_id', 'job_position_id'],
                'wfm_requirement_plan_unit_position_idx'
            );
        });

        Schema::create('wfm_manpower_requests', function (Blueprint $table): void {
            $table->id();
            $table->string('request_no')->unique();
            $table->foreignId('workforce_plan_id')
                ->nullable()
                ->constrained('wfm_workforce_plans')
                ->nullOnDelete();
            $table->foreignId('workforce_requirement_id')
                ->nullable()
                ->constrained('wfm_workforce_requirements')
                ->nullOnDelete();
            $table->unsignedBigInteger('org_unit_id')->nullable()->index();
            $table->unsignedBigInteger('org_team_id')->nullable()->index();
            $table->unsignedBigInteger('job_position_id')->index();
            $table->unsignedInteger('required_count')->default(1);
            $table->string('reason', 100)->nullable();
            $table->unsignedSmallInteger('priority')->default(0);
            $table->date('target_date')->nullable();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('requested_by_id')->nullable()->index();
            $table->dateTime('requested_at')->nullable();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->dateTime('approved_at')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index(['job_position_id', 'status'], 'wfm_manpower_position_status_idx');
        });

        Schema::create('wfm_candidates', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('source', 100)->nullable()->index();
            $table->string('status', 40)->default('active')->index();
            $table->date('available_from')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_job_applications', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('candidate_id')
                ->constrained('wfm_candidates')
                ->cascadeOnDelete();
            $table->foreignId('manpower_request_id')
                ->nullable()
                ->constrained('wfm_manpower_requests')
                ->nullOnDelete();
            $table->unsignedBigInteger('job_position_id')->index();
            $table->string('status', 40)->default('applied')->index();
            $table->dateTime('applied_at')->nullable();
            $table->dateTime('withdrawn_at')->nullable();
            $table->json('profile_snapshot')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->unique(
                ['candidate_id', 'manpower_request_id'],
                'wfm_application_candidate_request_unique'
            );
        });

        Schema::create('wfm_candidate_shortlists', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('manpower_request_id')
                ->constrained('wfm_manpower_requests')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('job_position_id')->index();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('prepared_by_id')->nullable()->index();
            $table->dateTime('prepared_at')->nullable();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->dateTime('approved_at')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_candidate_shortlist_items', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('candidate_shortlist_id')
                ->constrained('wfm_candidate_shortlists')
                ->cascadeOnDelete();
            $table->foreignId('candidate_id')
                ->constrained('wfm_candidates')
                ->cascadeOnDelete();
            $table->foreignId('job_application_id')
                ->constrained('wfm_job_applications')
                ->cascadeOnDelete();
            $table->unsignedInteger('ranking')->nullable();
            $table->decimal('score', 8, 2)->nullable();
            $table->string('status', 40)->default('shortlisted')->index();
            $table->text('remarks')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->unique(
                ['candidate_shortlist_id', 'job_application_id'],
                'wfm_shortlist_application_unique'
            );
            $table->unique(
                ['candidate_shortlist_id', 'ranking'],
                'wfm_shortlist_ranking_unique'
            );
        });

        Schema::create('wfm_development_plans', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->string('status', 40)->default('draft')->index();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('objectives')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_performance_reviews', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->unsignedBigInteger('reviewer_staff_id')->nullable()->index();
            $table->date('review_period_start');
            $table->date('review_period_end');
            $table->string('status', 40)->default('draft')->index();
            $table->decimal('rating', 8, 2)->nullable();
            $table->json('outcomes')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index(
                ['staff_id', 'review_period_start', 'review_period_end'],
                'wfm_review_staff_period_idx'
            );
        });

        Schema::create('wfm_compensation_reviews', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->unsignedBigInteger('reviewed_by_id')->nullable()->index();
            $table->date('effective_date')->nullable();
            $table->string('status', 40)->default('draft')->index();
            $table->json('current_package')->nullable();
            $table->json('proposed_package')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_career_plans', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->unsignedBigInteger('target_job_position_id')->nullable()->index();
            $table->string('status', 40)->default('draft')->index();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('objectives')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_promotion_requests', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('current_job_position_id')->nullable()->index();
            $table->unsignedBigInteger('target_job_position_id')->index();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('requested_by_id')->nullable()->index();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->date('effective_date')->nullable();
            $table->unsignedBigInteger('job_agreement_id')->nullable()->index();
            $table->text('reason')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_transfer_requests', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('from_job_position_id')->nullable()->index();
            $table->unsignedBigInteger('to_job_position_id')->nullable()->index();
            $table->unsignedBigInteger('from_org_unit_id')->nullable()->index();
            $table->unsignedBigInteger('to_org_unit_id')->nullable()->index();
            $table->string('mobility_type', 50)->default('transfer')->index();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('requested_by_id')->nullable()->index();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->date('effective_date')->nullable();
            $table->unsignedBigInteger('job_agreement_id')->nullable()->index();
            $table->text('reason')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_employee_relations_cases', function (Blueprint $table): void {
            $table->id();
            $table->string('case_no')->unique();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('job_position_id')->nullable()->index();
            $table->string('case_type', 80)->index();
            $table->string('status', 40)->default('open')->index();
            $table->unsignedBigInteger('opened_by_id')->nullable()->index();
            $table->unsignedBigInteger('assigned_to_id')->nullable()->index();
            $table->dateTime('opened_at')->nullable();
            $table->dateTime('closed_at')->nullable();
            $table->text('summary')->nullable();
            $table->text('resolution')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_succession_plans', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('job_position_id')->index();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('owner_staff_id')->nullable()->index();
            $table->date('review_date')->nullable();
            $table->string('criticality', 40)->nullable()->index();
            $table->json('requirements')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_succession_candidates', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('succession_plan_id')
                ->constrained('wfm_succession_plans')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('staff_id')->index();
            $table->string('readiness', 40)->nullable()->index();
            $table->unsignedInteger('ranking')->nullable();
            $table->date('target_ready_date')->nullable();
            $table->json('development_actions')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->unique(
                ['succession_plan_id', 'staff_id'],
                'wfm_succession_plan_staff_unique'
            );
        });

        Schema::create('wfm_separation_requests', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->unsignedBigInteger('staff_agreement_id')->nullable()->index();
            $table->string('reason', 80)->index();
            $table->date('effective_date')->nullable();
            $table->date('last_working_date')->nullable();
            $table->string('status', 40)->default('draft')->index();
            $table->unsignedBigInteger('requested_by_id')->nullable()->index();
            $table->dateTime('requested_at')->nullable();
            $table->unsignedBigInteger('approved_by_id')->nullable()->index();
            $table->dateTime('approved_at')->nullable();
            $table->text('remarks')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_exit_clearances', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('separation_request_id')
                ->unique()
                ->constrained('wfm_separation_requests')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('staff_id')->index();
            $table->string('status', 40)->default('pending')->index();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->unsignedBigInteger('completed_by_id')->nullable()->index();
            $table->json('summary')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });

        Schema::create('wfm_exit_clearance_items', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exit_clearance_id')
                ->constrained('wfm_exit_clearances')
                ->cascadeOnDelete();
            $table->string('code');
            $table->string('name');
            $table->string('owner_type')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('status', 40)->default('pending')->index();
            $table->unsignedBigInteger('completed_by_id')->nullable()->index();
            $table->dateTime('completed_at')->nullable();
            $table->text('remarks')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->unique(['exit_clearance_id', 'code'], 'wfm_clearance_item_code_unique');
            $table->index(['owner_type', 'owner_id'], 'wfm_clearance_owner_idx');
        });

        Schema::create('wfm_employment_archives', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index();
            $table->foreignId('separation_request_id')
                ->unique()
                ->constrained('wfm_separation_requests')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('archived_by_id')->nullable()->index();
            $table->dateTime('archived_at')->nullable()->index();
            $table->boolean('rehire_eligible')->nullable()->index();
            $table->json('staff_snapshot');
            $table->json('agreement_snapshot')->nullable();
            $table->json('job_position_snapshot')->nullable();
            $table->json('attributes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wfm_employment_archives');
        Schema::dropIfExists('wfm_exit_clearance_items');
        Schema::dropIfExists('wfm_exit_clearances');
        Schema::dropIfExists('wfm_separation_requests');
        Schema::dropIfExists('wfm_succession_candidates');
        Schema::dropIfExists('wfm_succession_plans');
        Schema::dropIfExists('wfm_employee_relations_cases');
        Schema::dropIfExists('wfm_transfer_requests');
        Schema::dropIfExists('wfm_promotion_requests');
        Schema::dropIfExists('wfm_career_plans');
        Schema::dropIfExists('wfm_compensation_reviews');
        Schema::dropIfExists('wfm_performance_reviews');
        Schema::dropIfExists('wfm_development_plans');
        Schema::dropIfExists('wfm_candidate_shortlist_items');
        Schema::dropIfExists('wfm_candidate_shortlists');
        Schema::dropIfExists('wfm_job_applications');
        Schema::dropIfExists('wfm_candidates');
        Schema::dropIfExists('wfm_manpower_requests');
        Schema::dropIfExists('wfm_workforce_requirements');
        Schema::dropIfExists('wfm_workforce_plans');
    }
};
