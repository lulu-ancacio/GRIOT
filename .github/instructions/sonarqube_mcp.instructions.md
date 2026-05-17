---
applyTo: "**/*"
---

These are some guidelines when using the SonarQube MCP server.

# Important Tool Guidelines

## Basic usage
- **IMPORTANT**: After generating or modifying code files, call the `analyze_file_list` tool (if available) to analyze the changed files.
- **IMPORTANT**: Before starting a task, disable automatic analysis using the `toggle_automatic_analysis` tool if available.
- **IMPORTANT**: After finishing code generation, re-enable automatic analysis using the `toggle_automatic_analysis` tool if available.

## Project Keys
- When a user mentions a project key, use `search_my_sonarqube_projects` first to find the exact project key.
- Don't guess project keys — look them up.

## Code Language Detection
- Detect the programming language from code syntax when possible; if unclear, ask the user.

## Branch and Pull Request Context
- Include the branch parameter when a feature branch is mentioned.

## Code Issues and Violations
- Do not verify fixes using `search_sonar_issues_in_projects`; the server may not reflect updates immediately.

# Common Troubleshooting

## Authentication Issues
- SonarQube requires USER tokens (not project tokens)
- When the error `SonarQube answered with Not authorized` occurs, verify the token type

## Project Not Found
- Use `search_my_sonarqube_projects` to find available projects
- Verify project key spelling and format

## Code Analysis Issues
- Ensure the programming language is correctly specified.
- Remind users that snippet analysis doesn't replace full project scans.
- Provide full file content for more accurate analysis.
