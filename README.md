# @Hack 2026: Intern's Portal

> Authored by [Harsh](https://github.com/sudo-i-u-harsh11235).

- **Category**: `Web`
- **Solves**: `25/120`
- **Tags**: `none`
- **Protocol**: `http`

> Recon team found that a Web Portal initialized by the Aliens is made by one of their interns. And it's doing something
> weird with its urls.
>
> Find a way to exploit and gain access to their servers.
>

## Files

- **[Download: source-code.zip](https://github.com/athack-ctf/chall2026-interns-portal/raw/refs/heads/main/offline-artifacts/source-code.zip)**

## Access a dockerized instance

Run challenge container using docker compose

```
docker compose up -d
```

Open below URL on your browser

```
http://localhost:53012/
```

<details>
<summary>
How to stop/restart challenge?
</summary>

To stop the challenge run

```
docker compose stop
```

To restart the challenge run

```
docker compose restart
```

</details>

## Reveal Flag(s)

Did you try solving this challenge?
<details>
<summary>
Yes
</summary>

Did you **REALLY** try solving this challenge?

<details>
<summary>
Yes, I promise!
</summary>

- Flag 1: `ATHACKCTF{path_n0rm4liz4t10n_g0ne_wr0ng}`

</details>
</details>


---

## About @Hack

[@Hack](https://athackctf.com/) is an annual CTF (Capture The Flag) competition hosted
by [HEXPLOIT ALLIANCE](https://hexploit-alliance.com/) and [TECHNATION](https://technationcanada.ca/) at Concordia
University in Montreal, Canada.

---
[Check more challenges from @Hack 2026](https://github.com/athack-ctf/AtHackCTF-2026-Challenges).
