<?php
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

it('belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job      = Job::factory()->create([ 'employer_id' => $employer->id ]);
    
    // Act and Assert
    expect($job->employer->is($employer))->toBeTrue();
});


// a job can have tags
it('can have tags', function () {
    // Arrange
    $job = Job::factory()->create();
    $tag = Tag::factory()->create();
    
    // Act
    $job->tags()->attach($tag);
    
    // Assert
    expect($job->tags->first()->is($tag))->toBeTrue();
});
