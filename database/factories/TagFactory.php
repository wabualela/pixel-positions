<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Frontend', 'Backend', 'FullStack', 'DevOps', 'QA', 'UX', 'UI', 'Mobile', 'Web', 'Database', 'Security', 'Cloud', 'AI', 'ML', 'Big Data', 'Blockchain', 'IoT', 'AR', 'VR', 'Game', 'Embedded', 'Robotics', 'Automation', 'Microservices', 'Serverless', 'Containers', 'Kubernetes', 'Docker', 'CI/CD', 'TDD', 'BDD', 'DDD', 'Agile', 'Scrum', 'Kanban', 'Lean', 'XP', 'Pair Programming', 'Mob Programming', 'Code Review', 'Refactoring', 'Clean Code', 'SOLID', 'Design Patterns', 'Architectural Patterns', 'Anti Patterns', 'Best Practices', 'Coding Standards', 'Conventions', 'Documentation', 'Testing', 'Debugging', 'Profiling', 'Monitoring', 'Logging', 'Alerting', 'Metrics', 'Tracing', 'Performance', 'Scalability', 'Reliability', 'Resilience', 'Security', 'Privacy', 'Compliance', 'Accessibility', 'Internationalization', 'Localization', 'SEO', 'SEM', 'SMM']),
        ];
    }
}
